<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class sms1payActions extends sfActions
{
    const SMSP_PARTNER_ID = "10229";
    const SMSP_PARTNER_PASSWORD = "4a6ec3e52a89dcb4fa020d0a9d6aab4e";
    public function executeIndex(sfWebRequest $request)
    {
        $telco = $request->getParameter("telco", "");
        $command_code = $request->getParameter("command_code", "");
        $arParams['access_key'] = $request->getParameter("access_key", "");
        $arParams['command_code'] = $request->getParameter("command_code", "");
        $arParams['mo_message'] = $request->getParameter("mo_message", "");
        $arParams['msisdn'] = $request->getParameter("msisdn", "");
        $arParams['request_id'] = $request->getParameter("request_id", "");
        $arParams['request_time'] = $request->getParameter("request_time", "");
        $arParams['signature'] = $request->getParameter("signature", "");
        $error_code= $request->getParameter("error_code", "");
        $amount = $request->getParameter("amount", 0);
        $error_message = $request->getParameter("error_message", "");
        $data = "access_key=" . $arParams['access_key'] . "&amount=" . $amount. "&command_code=" . $arParams['command_code'] . "&error_code=" . $error_code . "&error_message=". $error_message
            . "&mo_message="
            . $arParams['mo_message'] . "&msisdn=" . $arParams['msisdn'] . "&request_id=" . $arParams['request_id']
            . "&request_time=" . $arParams['request_time'];
        $secret = 'hw06ry3nc9z4qpa9v1x6v6vjd7kwkczb'; // serequire your secret key from 1pay
        $signature = hash_hmac("sha256", $data, $secret);
        $arResponse['type'] = 'text';

        $arr_content = explode(' ', $arParams['mo_message']);
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/sms1pay/check_' . date('d') . '.log'));
        $logger_err = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/sms1pay/err_' . date('d') . '.log'));
        $user_nap = UserTable::getUserByUserId(end($arr_content));
        if($telco = "vtm" && empty($error_code)){
            if($user_nap){
                $logger->log('[check viettel 9029]' .  'status=1|');
                $arResponse['status'] = 1;
                $arResponse['sms'] = 'Giao dich thanh cong ... Hotline...';
            } else {
                $logger_err->log('[check viettel 9029]' .  'status=0|user:' . $arr_content);
                $arResponse['status'] = 0;
                $arResponse['sms'] = 'User khong ton tai tren he thong. Hotline 0124.983.5555';
            }
            echo json_encode($arResponse);die;
        }
        $mo = new MoHistory();
        $mo->setMoId(1);
        $mo->setKeyword($command_code);
        $mo->setUserId($user_nap? $user_nap->getUserId() : 1);
        $mo->setAmount($amount);
        $mo->setTransdate("");
        $mo->setShortcode("9029");
        $mo->setContent($arParams['mo_message']);
        $mo->setPhoneNumber($arParams['msisdn']);
        $mo->setTelco($telco);
        if ($arParams['signature'] == $signature) {
            //if sms content, amount,... are ok. return success
            $logger->log('[info]' .  'telco|' . $telco. "|msisdn" . $amount. "|SDT:" . $arParams['msisdn']);
            $mo->setStatus(0);
            $arResponse['status'] = 1;
            $arResponse['sms'] = 'Ban da nap thanh cong '.$amount.' dong vao tai khoan bigken  Hotline 0124.983.5555';
            $mo->save();
            $mo_result = new MoResult();
            $mo_result->setMoId($mo->getId());
            $mo_result->setAmount($amount);
            $mo_result->setUserId($arParams['msisdn']);
            $mo_result->setUserName($user_nap? $user_nap->getUserName() : "null");
            $mo_result->save();
        }
        else {
            //if not, return unsuccess
            $logger_err->log('[sai chu ky]' . $data);
            $logger_err->log('[chu ky dung]' . $arParams['signature']);
            $logger_err->log('[chu ky local]' . $signature);
            $arResponse['status'] = 0;
            $arResponse['sms'] = 'Giao dich khong thanh cong. Tin nhan se duoc hoan cuoc sau 20 ngay. Hotline 0124.983.5555.';
        }
        // return json for 1pay system
        echo json_encode($arResponse); die;
    }
}