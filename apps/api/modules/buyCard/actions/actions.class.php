<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 16/08/2016
 * Time: 2:00 CH
 */
class buyCardActions extends sfActions
{
    //mua thẻ cào
    public function executeIndex(sfWebRequest $request)
    {
        $config = array(
            //link webservice
            //'ws_url' => 'http://itopup-test.megapay.net.vn:8086/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',
            'ws_url' => 'http://naptien.thanhtoan247.vn:8082/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',

            //partner username
            'partnerName' => 'gamevina',

            //partner password
            'partnerPassword' => '123123a@A',

            //key sofpin
            'key_sofpin' => '499783711F369FF0C791B0DFBF8601FA',

            //thời gian tối đa thực hiện giao dịch (tính bằng giây)
            'time_out' => 150

        );
        $info = array();
        $info['provider'] = $request->getParameter("provider");
        $info['amount'] = $request->getParameter("amount");
        $info['quantity'] = $request->getParameter("quantity");
        $securityKey = $request->getParameter("securityKey", "");
        $requestId = $request->getParameter("requestId");
        $logger_err = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/buyCard/error_' . date('d') . '.log'));

        if(!$securityKey || !$requestId){
            $logger_err->log("[ error buyCardActions check null] check ip:" . VtHelper::getRealIpAddr()  . "|RequestKey: " . $securityKey . "|requestId" .  $requestId);
            return new Response(BuyCardErrorCode::FAILURE, BuyCardErrorCode::getMessage(BuyCardErrorCode::FAILURE, BuyCardErrorCode::$messages));
        }
        $exchangeRequest = ExchangeAssetRequestTable::checkRequest($securityKey, $requestId);
        if(!$exchangeRequest){
            $logger_err->log("[error buyCardActions index invalid request] check ip:" . VtHelper::getRealIpAddr()  . "|RequestKey: " . $securityKey . "|requestId" .  $requestId);
            return new Response(BuyCardErrorCode::FAILURE, BuyCardErrorCode::getMessage(BuyCardErrorCode::FAILURE, BuyCardErrorCode::$messages));
        }
        $service = new WsBuyCard();
        $request_topup_id = $config['partnerName'].'_'.time().rand(000, 999);
        $sofpin = $service->downloadSofpin($info,$request_topup_id);
//        echo '<meta charset="utf-8" />';
//        echo 'Thong tin tra ve: <br/>';
//        echo "<pre>"; print_r($sofpin);
//        echo "</pre>";
        $key = substr(md5($config['key_sofpin']), 0, 24);
        $cleartext = mcrypt_decrypt("tripledes", $key, base64_decode($sofpin->listCards), "ecb", "\0\0\0\0\0\0\0\0");


        $cleartext = substr($cleartext, 0, stripos($cleartext,"]}") + 2);
//        echo "Sofpin decrypt: ". $cleartext . "<br>";
        $array_code = json_decode($cleartext)->listCards;
        $result = array();
        foreach ($array_code as $index => $code){
            $code_details = explode("|",$code);
            $result[$index]['provider'] = $code_details['0'];
            $result[$index]['amount'] = $code_details['1'];
            $result[$index]['serial'] = $code_details['2'];
            $result[$index]['pin'] = $code_details['3'];
        }
        $exchangeRequest->setResponseData(json_encode($result));
        $exchangeRequest->setRequestTopupId($request_topup_id);
        $exchangeRequest->setStatus(VtCommonEnum::NUMBER_ONE);
        $exchangeRequest->save();
        return new Response(BuyCardErrorCode::SUCCESS, ErrorCodeUtil::getMessage(BuyCardErrorCode::SUCCESS, BuyCardErrorCode::$messages), $result);
    }
    public function executeShowBuyCard(sfWebRequest $request)
    {
        $config = array(
            //link webservice
            //'ws_url' => 'http://itopup-test.megapay.net.vn:8086/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',
            'ws_url' => 'http://naptien.thanhtoan247.vn:8082/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',

            //partner username
            'partnerName' => 'gamevina',

            //partner password
            'partnerPassword' => '123123a@A',

            //key sofpin
            'key_sofpin' => '499783711F369FF0C791B0DFBF8601FA',

            //thời gian tối đa thực hiện giao dịch (tính bằng giây)
            'time_out' => 150

        );
        $service =new WsBuyCard ($config);
        $request_id = $request->getParameter("request_id", null);
        $redownload = $service->reDownloadSoftpin($request_id);
        echo '<meta charset="utf-8" />';
        echo 'Ket qua reDowload Sofpin. Request_id: '.$request_id.'<br/>';
        echo "<pre>";
        print_r($redownload);
        echo "</pre>";
        $key = substr(md5($config['key_sofpin']), 0, 24);
        $cleartext = mcrypt_decrypt("tripledes", $key, base64_decode($redownload->listCards), "ecb", "\0\0\0\0\0\0\0\0");
        echo "Sofpin decrypt: ". $cleartext . "<br>";
        die;
    }

}