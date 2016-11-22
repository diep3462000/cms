<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class chargeActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
//        if(!sfContext::getInstance()->getUser()->isLogin()){
//            $this->redirect('@homepage');
//        }

        $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Nạp tiền vào tài khoản'));
        $this->form = new vtChargingForm();
        $i18n = sfContext::getInstance()->getI18N();
        ini_set('max_execution_time', 3000);
        ini_set('memory_limit', '-1');
        if($request->isMethod('post')){
            $values = $request->getParameter($this->form->getName());
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {
                try {
                    $userId = $values["user_id"];
                    $user = UserTable::getUserByUserId($userId);
                    $provider = $values["telco_code"];
                    $telco = CardProviderTable::getProviderByCode($provider);
                    if(!$user|| !$telco){
                        $this->getUser()->setFlash('notice', "Mã nhà mạng không hợp lệ");
                    } else {
                        $userName= $user->getUserName();
                        $cardSerial = $values["serial"];
                        $cardPin = $values["card_code"];
//                    $key_webservice =  $values["user_Id"];$request->getParameter("key_webservice", null);
                        $call_api = file_get_contents('http://bigken.net:8080/api.php/charge?cardSerial='.$cardSerial . '&cardPin='.$cardPin. '&provider=' .$provider. '&userId=' .$userId. '&userName=' . $userName);
                        $arr_call = (array) json_decode($call_api);
                        if($arr_call["errorCode"] == 0){
                            $add_money = New AddMoney();
                            $data = $arr_call["data"];
                            $add_money->setUserId($userId);
                            $add_money->setAddCash($data->realAmount);
                            $message = "Nạp thẻ " . $telco->getProviderName() . " qua web bigket.net, mệnh giá " . VtHelper::number_format($data->realAmount) . "VNĐ";
                            $add_money->setDescription($message);
                            $add_money->setAddCash($data->realAmount * $telco->getValuePercent());
                            $add_money->setStatus(0);
                            $add_money->setAdminId(7);// admin tạo
                            $add_money->save();
                            $this->getUser()->setFlash('success', $message . ". Kiểm tra tài khoản sau ít phút nữa");
                        } else {
                            $this->getUser()->setFlash('notice', $arr_call["message"]);
                        }
                    }

                }catch (Doctrine_Validator_Exception $e) {
                    $this->getUser()->setFlash('notice', $i18n->__("Thực hiện không thành công!" . $e->errorMessage()));
                }
            }else{
                $this->getUser()->setFlash('notice', $i18n->__("Bạn vui lòng, kiểm tra lại dữ liệu đã nhập!"));
            }
        }
    }
}