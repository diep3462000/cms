<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class smsActions extends sfActions
{
    const SMSP_PARTNER_ID = "10229";
    const SMSP_PARTNER_PASSWORD = "4a6ec3e52a89dcb4fa020d0a9d6aab4e";
    public function executeIndex(sfWebRequest $request)
    {
        $partnerid = $request->getParameter("partnerid", null);
        $moid = $request->getParameter("moid", null);
        $userid = $request->getParameter("userid", ""); // so dien thoai
        $shortcode = $request->getParameter("shortcode", 1231);

        $keyword = $request->getParameter("keyword", null);
        $content = $request->getParameter("content", null);

        $transdate = $request->getParameter("transdate", "VTT");
        $checksum = $request->getParameter("checksum", 1231);
        $amount = $request->getParameter("amount", 1231);
        $telcocode = $request->getParameter("telcocode", "VTT");
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/sms/check_' . date('d') . '.log'));
        $logger_err = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/sms/err_' . date('d') . '.log'));
        $logger->log('[smsActions] check $checksum' .   $this->get_checksum_reponse($moid, $shortcode, $keyword, $content, $transdate));
        if(!empty($partnerid) && $partnerid == self::SMSP_PARTNER_ID && !empty($moid) && !empty($userid) && !empty($shortcode)
            && !empty($keyword) && !empty($content) && !empty($transdate)
            && !empty($checksum) && $checksum == $this->get_checksum_reponse($moid, $shortcode, $keyword, $content, $transdate)
            && isset($amount)){
            $check_moid = MoHistoryTable::checkMoExited($moid);
            if($check_moid) {
                $logger_err->log('[smserror]' .  'SMS PAYMENT - ERROR: MoID is available');
                http_response_code(400);
                echo 'requeststatus=2';
                die;
            } else {
                $arr_content = explode(' ', $content);
//                var_dump(end($arr_content));die;
             //  $user_nap = UserTable::getUserByName(end($arr_content));
                if($amount == 1500 &&  strtolower(end($arr_content)) == 'reset') {
                    $user_nap = UserInfoTable::getUserByMsisdn($userid);
                } else {
                    $user_nap = UserTable::getUserByUserId(end($arr_content));
                    $logger->log('[smsActions] check user_nap' .   end($arr_content));
                }
                if(!$user_nap){
                    http_response_code(400);
                    $logger_err->log('[error] check user_nap khong ton tai' .  end($arr_content));
//                    echo 'message=0|noi dung khong hop le';
                    echo 'requeststatus=2';
                    die;
                }


                $mo = new MoHistory();
                $mo->setMoId($moid);
                $mo->setKeyword($keyword);
                $mo->setUserId($user_nap->getUserId());
                $mo->setAmount($amount);
                $mo->setTransdate($transdate);
                $mo->setShortcode($shortcode);
                $mo->setContent($content);
                $mo->setPhoneNumber($userid);
                $mo->setTelco($telcocode);
                $mo->setStatus($amount == 1000 ? 3 :0);
                $mo->save();
                $mo_result = new MoResult();
                $mo_result->setMoId($mo->getId());
                $mo_result->setAmount($amount);
                $mo_result->setUserId($userid);
                $mo_result->setUserName($user_nap->getUserName());
                $mo_result->save();
                //update số tiền cho khách hàng
                //gọi MT sang SMS Payment để xác nhận (nếu ko gọi MT sẽ không được đối soát)
                $url = 'http://sms.megapayment.net.vn:9099/smsApi?';
                $url .= 'partnerid='. self::SMSP_PARTNER_ID;
                $url .= '&moid='.$moid;
                $mtid = self::SMSP_PARTNER_ID.date('YmdHi').rand(0, 99999);
                $url .= '&mtid='.$mtid;
                $url .= '&userid='.$userid;
                $url .= '&receivernumber='. $userid;
                $url .= '&shortcode='.$shortcode;
                $url .= '&keyword='.$keyword;
                if($amount == 1000 || $amount == 1500){
                    $verify = new UserOTP();
                    $verify->setUserId($user_nap->getUserId());
                    $code = VtHelper::genRandomNumber();
                    $verify->setMoId($mo->getId());
                    $verify->setMsisdn($userid);
                    $verify->setVerifyCode($code);
                    $verify->setExpriedTime(date('Y-m-d H:i:s', time() + 3600));
                    $verify->setType($amount == 1000? 0:1); // 0 lã xác thực, 1 ; 1 ;à reset mật khẩu
                    $verify->setStatus(0);
                    $mt_content = 'Ma+xac+thuc+tai+khoan+bigken+cua+ban+la+'.$code.'+.Ma+xac+thuc+chi+co+gia+tri+trong+90+phut';
                    $verify->save();
                } else {
                    $mt_content = 'Ban+da+nap+thanh+cong+'.$amount.'+dong+vao+tai+khoan+bigken';
                }
                $url .= '&content='.$mt_content;
                $url .= '&messagetype=1';
                $url .= '&totalmessage=1';
                $url .= '&messageindex=1';
                $url .= '&ismore=0';
                $url .= '&contenttype=0';
                $mt_transdate = date('YmdHis');
                $url .= '&transdate='.$mt_transdate;
                $url .= '&checksum='.md5($mtid.$moid.$shortcode.$keyword.$mt_content.$mt_transdate.self::SMSP_PARTNER_PASSWORD);
                $url .= '&amount='.$amount;

              //  log_message('error', 'SMS PAYMENT - MT RESPONSE: '.$url, false, true);

                //goi ham confirm mt
                $confirm = $this->get_curl($url);
           //     log_message('error', 'SMS PAYMENT - MT RESPONSE DATA: '.$confirm, false, true);
                $logger->log('[info] SMS PAYMENT - MT RESPONSE DATA: ' .$confirm, false, true);

                if(!empty($confirm)){
                    $status = str_replace('requeststatus=', '', $confirm);
                    $logger->log('[status] requeststatus ' .$status, false, true);
                    if($status == '200' || $status = 200){
                        $logger->log('[success] SMS PAYMENT - CONFIRM MT OK ' .$confirm, false, true);
                        http_response_code(200);
                        echo 'requeststatus=200'; die;
                    }else{
                        $logger_err->log('[error] SMS PAYMENT - CONFIRM MT NOT OK ');
                        http_response_code(400);
                        echo 'requeststatus='.$status; die;
                    }
                }
                http_response_code(400);
                echo 'requeststatus=400';
                die;
            }
        }
        $logger_err->log('[error] [null] request  ');
        http_response_code(400);
        echo 'requeststatus=2';
        die;
    }
    private function get_checksum_reponse($moid, $shortcode, $keyword, $content, $transdate)
    {
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/sms/check_' . date('d') . '.log'));
        $logger->log('[get_checksum_reponse] check $checksum' .   $moid. $shortcode.$keyword.str_replace(' ', '+', $content).$transdate.self::SMSP_PARTNER_PASSWORD);
        return md5($moid.$shortcode.$keyword.str_replace(' ', '+', $content).$transdate.self::SMSP_PARTNER_PASSWORD);
    }
    public function get_curl($url)
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
    private function curl_exec_follow($ch, &$maxredirect = null)
    {
        $user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5)".
            " Gecko/20041107 Firefox/1.0";
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent );

        $mr = $maxredirect === null ? 5 : intval($maxredirect);

        if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, $mr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        } else {

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

            if ($mr > 0)
            {
                $original_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                $newurl = $original_url;

                $rch = curl_copy_handle($ch);

                curl_setopt($rch, CURLOPT_HEADER, true);
                curl_setopt($rch, CURLOPT_NOBODY, true);
                curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
                do
                {
                    curl_setopt($rch, CURLOPT_URL, $newurl);
                    $header = curl_exec($rch);
                    if (curl_errno($rch)) {
                        $code = 0;
                    } else {
                        $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
                        if ($code == 301 || $code == 302) {
                            preg_match('/Location:(.*?)\n/', $header, $matches);
                            $newurl = trim(array_pop($matches));

                            if(!preg_match("/^https?:/i", $newurl)){
                                $newurl = $original_url . $newurl;
                            }
                        } else {
                            $code = 0;
                        }
                    }
                } while ($code && --$mr);

                curl_close($rch);

                if (!$mr)
                {
                    if ($maxredirect === null)
                        trigger_error('Too many redirects.', E_USER_WARNING);
                    else
                        $maxredirect = 0;

                    return false;
                }
                curl_setopt($ch, CURLOPT_URL, $newurl);
            }
        }
        return curl_exec($ch);
    }
}