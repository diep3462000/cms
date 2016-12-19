<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class charge2Actions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $response = $this->getResponse();
        $response->setContentType('application/json');
        $userId = $request->getParameter("userId", null);
        $userName = $request->getParameter("userName", null);
        $provider = $request->getParameter("provider", "VTT");
        $cardSerial = $request->getParameter("cardSerial", 1231);
        $cardPin = $request->getParameter("cardPin", 23123);
        $key_webservice =  $request->getParameter("key_webservice", null);
        $key_check = md5(sfConfig::get('app_username') . date("Y/m/d/h")  . sfConfig::get('app_password'));
        if($key_webservice != $key_check) {
            //return new ResponseOne(PaymentErrorCode::LOGIN_FAIL,
              //  PaymentErrorCode::getMessage(PaymentErrorCode::LOGIN_FAIL, PaymentErrorCode::$messages));
        }
        $request_time = date("Y-m-d H:i:s");
        //var_dump($request_time);die;
        //LogPaymentTable
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/success_' . date('Y_m_d') . '.log'));
        $logger_err = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/error_' . date('Y_m_d') . '.log'));
        $logger_ex = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/exception_' . date('Y_m_d') . '.log'));
        if(LogPaymentTable::countLockPayment($userId) > 10 ){
           return new Response(PaymentErrorCode::CHARGE_BAN, PaymentErrorCode::getMessage(PaymentErrorCode::CHARGE_BAN, PaymentErrorCode::$messages));
        }
        ini_set('max_execution_time', 180);
        if(($userId && $userName && $provider && $cardSerial && $cardPin)) {
            try{
//                $ws = new WsChargeVNP();
//                $m_Card_DATA = $cardSerial.":".$cardPin.":"."0".":".$provider;
//                $result = $ws->cardCharging($m_Card_DATA);
//                $result_return = array();
//                foreach($result as $key=>$value){
//                    $result_return[$key] = $value;
//                }

                $yamlFile = sfConfig::get('sf_app_dir') . '/config/bccs.yml';
                $arrData = sfYaml::load($yamlFile);
                $bccsConfig = $arrData['bccs'];
                $wsdl = $bccsConfig['ws_url'];
                $url = $wsdl;
                $url .= '?method=verifyCard';
                $url .= '&partnerId='.$bccsConfig['partnerId'];
                $url .= '&cardSerial='.$cardSerial;
                $url .= '&cardPin='.$cardPin;
                $transid = $this->get_transid($bccsConfig['partnerId']);
                $url .= '&transId='.$transid;
                $url .= '&telcoCode='.$provider;
                $url .= '&targetAcc='.$bccsConfig['targetAcc'];
                $url .= '&password='.md5($bccsConfig['password']);
                $url .= '&signature='.$this->signature_hash($transid, $bccsConfig, $cardSerial, $cardPin, $provider);
                $response_1 = $this->get_curl($url);
                //$response_1 = "status=00&message=card is correct&realAmount=0&transId=11359_20160708091904_843&realAmount=100000";

                if(!empty($response_1)){
                    $response = $this->parseArray($response_1);
                    //var_dump($response);die;
                    $api_response = null;
                    if($response['status'] == 0 || $response['status']  == '00'){
                        $api_response =  new Response(PaymentErrorCode::SUCCESS, PaymentErrorCode::getMessage(PaymentErrorCode::SUCCESS, PaymentErrorCode::$messages), $response);
                        LogPaymentTable::writeLogs($userId, isset($response['realAmount'])? $response['realAmount']: 0 , 0, $response['status'], $response['message'], $cardSerial, $cardPin, $request_time, $provider);
                        LogPaymentTable::resetLockPayment($userId);
                        $logger->log("userId:". $userId. "|userName:" . $userName
                            . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin . "|response:" . $response_1 . "|tranid:" . $transid);
                    } else {
                        LogPaymentTable::writeLogs($userId,0 , 0, $response['status'], $response['message'], $cardSerial, $cardPin, $request_time, $provider);
                        $api_response = new Response(PaymentErrorCode::FAILURE, PaymentErrorCode::getMessage(PaymentErrorCode::FAILURE, PaymentErrorCode::$messages));
                        $logger_err->log("userId:". $userId. "|userName:" . $userName
                            . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin . "|response:" . $response_1 . "|tranid:" . $transid);
                    }
                    return $api_response;
                }else{
                    $logger_ex->log("empty responseuserId:". $userId. "|userName:" . $userName
                        . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin . "|response:" . $response_1 . "|tranid:" . $transid);
                    return new ResponseOne(PaymentErrorCode::SERVER_ERROR,
                        PaymentErrorCode::getMessage(PaymentErrorCode::SERVER_ERROR, PaymentErrorCode::$messages));
                    echo 'Gạch thẻ không thành công. Mời bạn kiểm tra lại đường truyền và bật các extendsion cần thiết.'; die;
                }
                
               // var_dump($result);die;
                //LogPaymentTable::writeLogs($userId, $result->m_AMOUNT, 0, $result->m_Status, $result->m_Message, $cardSerial, $cardPin, $request_time);
                //return new Response(PaymentErrorCode::SUCCESS, PaymentErrorCode::getMessage(PaymentErrorCode::SUCCESS, PaymentErrorCode::$messages), $result_return);

            }catch (CallSoapErrorException $exc) {
                $logger_ex->log("CallSoapErrorException userId:". $userId. "|userName:" . $userName
                    . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin . "|response:" . $response_1 . "|tranid:" . $transid . "|ms:" .$exc->getMessage());
                $response =  new ResponseOne($exc->getCode(), $exc->getMessage());
                return $this->renderText($response->toJson());
            }

        } else {
            return new ResponseOne(PaymentErrorCode::NULL_PARAM,
                PaymentErrorCode::getMessage(PaymentErrorCode::NULL_PARAM, PaymentErrorCode::$messages));
        }
    }

    public function executeCharge(sfWebRequest $request)
    {
        $response = $this->getResponse();
        $response->setContentType('application/json');
        $userId = $request->getParameter("userId", null);
        $userName = $request->getParameter("userName", null);
        $provider = $request->getParameter("provider", "VTT");
        $cardSerial = $request->getParameter("cardSerial", 1231);
        $cardPin = $request->getParameter("cardPin", 23123);
        $request_time = date("Y-m-d H:i:s");
        //var_dump($request_time);die;
        //LogPaymentTable
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/success_' . date('Y_m_d') . '.log'));
        $logger_err = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/error_' . date('Y_m_d') . '.log'));
        $logger_auto = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/charge2/ban_' . date('Y_m_d') . '.log'));
        $count_err  = LogPaymentTable::countLockPayment($userId);
        if($count_err > 10 ){
            $logger_auto->log("Nap sai qua 10 lan. userId:". $userId. "|userName:" . $userName . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin);
            return new Response(PaymentErrorCode::CHARGE_BAN, PaymentErrorCode::getMessage(PaymentErrorCode::CHARGE_BAN, PaymentErrorCode::$messages));
        }
        if(($userId && $userName && $provider && $cardSerial && $cardPin)) {
            try{
                $ws = new WsChargeVNP();
                $m_Card_DATA = $cardSerial.":".$cardPin.":"."0".":".$provider;
                $result = $ws->cardCharging($m_Card_DATA);
                $result_return = array();
                LogPaymentTable::writeLogs($userId, empty($result->m_RESPONSEAMOUNT)? 0 : $result->m_RESPONSEAMOUNT , 0, $result->m_Status, $result->m_Message, $cardSerial, $cardPin, $request_time, $provider);
                if($result->m_Status == 1){
                    $result_return["status"] = 1;
                    $result_return["realAmount"] = empty($result->m_RESPONSEAMOUNT) ? 0 : $result->m_RESPONSEAMOUNT ;
                    $result_return["message"] = $result-> m_Message;
                    $result_return["transId"] = $result->m_TRANSID;
                    $logger->log("userId:". $userId. "|userName:" . $userName . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin ."|amount:" . $result->m_RESPONSEAMOUNT);
                    return new Response(PaymentErrorCode::SUCCESS, PaymentErrorCode::getMessage(PaymentErrorCode::SUCCESS, PaymentErrorCode::$messages), $result_return);
                } else {
                    $logger_err->log("Nap sai" . $count_err . " lan|userId:". $userId. "|userName:" . $userName . "|provider:" . $provider . "|cardSerial:" . $cardSerial. "|cardPin:" . $cardPin);
                    return new Response(PaymentErrorCode::FAILURE, PaymentErrorCode::getMessage(PaymentErrorCode::FAILURE, PaymentErrorCode::$messages), $result_return);
                }
            }catch (CallSoapErrorException $exc) {
                $response =  new ResponseOne($exc->getCode(), $exc->getMessage());
                return $this->renderText($response->toJson());
            }

        } else {
            return new ResponseOne(PaymentErrorCode::NULL_PARAM,
                PaymentErrorCode::getMessage(PaymentErrorCode::NULL_PARAM, PaymentErrorCode::$messages));
        }
    }

    private function get_transid($partnerId)
    {
        return $partnerId.'_'.date('YmdHis').'_'.rand(0, 999).rand(0, 99);
    }
    private function signature_hash($transId, $config,  $cardSerial, $cardPin, $provider)
    {
        return md5($config['partnerId'].'&'.$cardSerial.'&'.$cardPin.'&'.$transId.'&'.$provider.'&'.md5($config['password']));
    }
    private function get_curl($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);

        $str = curl_exec($curl);
        if(empty($str)) $str = $this->curl_exec_follow($curl);
        curl_close($curl);

        return $str;
    }
    private function parseArray($response)
    {
        $return = array();
        $response = explode('&', $response);
        if(!empty($response)){
            foreach($response as $key => $value){
                $data = explode('=', $value);
                if(!empty($data[1])){
                    $return[$data[0]] = $data[1];
                }
            }
            return $return;
        }else{
            return array();
        }
    }

}