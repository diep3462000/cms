<?php
/*
 * Class gọi lên webservice của Epay xử lý thanh toán, download mã thẻ,....
 * author: Nguyen Tat Loi
 * date: 31/3/2014
 */
class WsBuyCard

{
    private $config;

    /*
     * Hàm khởi tạo
     * author: Nguyen Tat Loi
     * date: 31/3/2014
     */
    public function __construct()
    {

        $this->config = array(
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
    }

    /*
     * Hàm payment
     * author: Nguyen Tat Loi
     * date: 31/3/2014
     */
    public function paymentCDV($info)
    {
        $client = new SoapClient($this->config['ws_url']);
        $request_id = $this->config['partnerName'].'_'.time().rand(000, 999);
        $time_out = $this->config['time_out'];
        $data = array(
            'requestId' => $request_id,
            'partnerName' => $this->config['partnerName'],
            'provider' => $info['provider'],
            'type' => $info['type'],
            'account' => $info['account'],
            'amount' => $info['amount'],
            'timeOut' => $time_out,
            'sign' => $this->sign($request_id.$this->config['partnerName'].$info['provider'].$info['type'].$info['account'].$info['amount'].$time_out)
        );
		
		
		print_r($data);
		
        try{
            $result = $client->__soapCall("paymentCDV", $data);
            return $result;
        }catch (Exception $ex){
            return false;
        }

    }


    /*
     * function query balance
     * get balance of partner with partner id in config
     * author: Nguyen Tat Loi
     * date: 11/4/2014
     */
    public function queryBalance()
    {
        $client = new SoapClient($this->config['ws_url']);
        $data = array(
            'partnerName' => $this->config['partnerName'],
            'sign' => $this->sign($this->config['partnerName'])
        );
        try{
            $result = $client->__soapCall("queryBalance", $data);
            return $result;
        }catch (Exception $ex){
            return false;
        }
    }

    /*
     * function download sofpin
     * author: Nguyen Tat Loi
     * date: 11/4/2014
     */
    public function downloadSofpin($info, $request_id)
    {
//        $this->config = array(
//            //link webservice
//            //'ws_url' => 'http://itopup-test.megapay.net.vn:8086/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',
//            'ws_url' => 'http://naptien.thanhtoan247.vn:8082/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',
//
//            //partner username
//            'partnerName' => 'gamevina',
//
//            //partner password
//            'partnerPassword' => '123123a@A',
//
//            //key sofpin
//            'key_sofpin' => '499783711F369FF0C791B0DFBF8601FA',
//
//            //thời gian tối đa thực hiện giao dịch (tính bằng giây)
//            'time_out' => 150
//
//        );

//        $this->config = array(
//            //link webservice
//            'ws_url' => 'http://itopup-test.megapay.net.vn:8086/CDV_Partner_Services_V1.0/services/Interfaces?wsdl',
//
//            //partner username
//            'partnerName' => 'partnerTest_PHP',
//
//            //partner password
//            'partnerPassword' => '123456abc',
//
//            //key sofpin
//            'key_sofpin' => '123456abc',
//
//            //thời gian tối đa thực hiện giao dịch (tính bằng giây)
//            'time_out' => 150
//
//        );
        $client = new SoapClient($this->config['ws_url']);

        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/requestId/' .  date('d') . '.log'));
        $logger_ex = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/exception/' .  date('d') . '.log'));
        $logger->log("[downloadSofpin function] check ip:" . VtHelper::getRealIpAddr()  . "|RequestId: " . $request_id );
        $data = array(
            'requestId' => $request_id,
            'partnerName' => $this->config['partnerName'],
            'provider' => $info['provider'],
            'amount' => $info['amount'],
            'quantity' => $info['quantity'],
            'sign' => $this->sign($request_id.$this->config['partnerName'].$info['provider'].$info['amount'].$info['quantity'])
        );
        try{
            $result = $client->__soapCall("downloadSoftpin", $data);
            return $result;
        }catch (Exception $ex){
            $logger_ex->log("[downloadSofpin index] check ip:" . VtHelper::getRealIpAddr()  . "|RequestId: " . $request_id  . "exception:" . $ex->getMessage());
            return false;
        }
    }

    /*
     * function topup
     * @param: $provider     //nha cung cap
     *      $account         //tai khoan nhan tien
     *      $amount          //so tien nap
     * author: Nguyen Tat Loi
     * date: 11/4/2014
     */
    public function topup($info)
    {
        $client = new SoapClient($this->config['ws_url']);
        $request_id = $this->config['partnerName'].'_'.time().rand(000, 999);
        $logger_ex = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/exception/' .  date('d') . '.log'));
        $data = array(
            'requestId' => $request_id,
            'partnerName' => $this->config['partnerName'],
            'provider' => $info['provider'],
            'account' => $info['account'],
            'amount' => $info['amount'],
            'sign' => $this->sign($request_id.$this->config['partnerName'].$info['provider'].$info['account'].$info['amount'])
        );
        try{
            $result = $client->__soapCall("topup", $data);
            return $result;
        }catch (Exception $ex){
            $logger_ex->log("[topup] check ip:" . VtHelper::getRealIpAddr()  . "|RequestId: " . $request_id  . "exception:" . $ex->getMessage());
            return false;
        }
    }

    /*
     * function check Orders CVD
     * @param: $Request_id      //ma giao dich can check
     * author: Nguyen Tat Loi
     * date: 28/5/2014
     */
    public function checkOrdersCVD($request_id = null)
    {
        if(!empty($request_id)){
            $client = new SoapClient($this->config['ws_url']);
            $data = array(
                'requestId' => $request_id,
                'partnerName' => $this->config['partnerName'],
                'sign' => $this->sign($request_id.$this->config['partnerName'])
            );
            $logger_ex = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/exception/' .  date('d') . '.log'));
            try{
                $result = $client->__soapCall("checkOrdersCDV", $data);
                return $result;
            }catch (Exception $ex){
                $logger_ex->log("[checkOrdersCVD] check ip:" . VtHelper::getRealIpAddr()  . "|RequestId: " . $request_id  . "exception:" . $ex->getMessage());
                return false;
            }
        }else{
            return false;
        }
    }


    /*
     * function check transaction
     * @params: $request_id         //ma giao dich can check
     *          $type               //loai giao dich can check
     * author: Nguyen Tat Loi
     * date: 28/5/2014
     */
    public function checkTrans($request_id = null, $type = 1)
    {
        if(!empty($request_id)){
            $client = new SoapClient($this->config['ws_url']);
            $data = array(
                'requestId' => $request_id,
                'partnerName' => $this->config['partnerName'],
                'type' => $type,
                'sign' => $this->sign($request_id.$this->config['partnerName'].$type)
            );
            $logger_ex = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/exception/' .  date('d') . '.log'));
            try{
                $result = $client->__soapCall("checkTrans", $data);
                return $result;
            }catch (Exception $ex){
                $logger_ex->log("[checkTrans] check ip:" . VtHelper::getRealIpAddr()  . "|RequestId: " . $request_id  . "exception:" . $ex->getMessage());
                return false;
            }
        }else{
            return false;
        }
    }

    /*
     * function redowload sofpin
     * author: Nguyen Tat Loi
     * date: 28/5/2014
     */
    public function reDownloadSoftpin($request_id = null)
    {
        if(!empty($request_id)){
            $client = new SoapClient($this->config['ws_url'], array('trace' => 1));
            $data = array(
                'requestId' => $request_id,
                'partnerName' => $this->config['partnerName'],
                'sign' => $this->sign($request_id.$this->config['partnerName'])
            );
            try{
                $result = $client->__soapCall("reDownloadSoftpin", $data);
                return $result;
            }catch (Exception $ex){
                return false;
            }
        }else{
            return false;
        }
    }

    /*
     * function sinh chữ ký
     * author: Nguyen Tat Loi
     * date: 31/3/2014
     */
    private function sign($data)
    {
        $private_key = file_get_contents(sfConfig::get('sf_app_dir') . "/config/key/private_key.pem");
        //Sign
        openssl_sign($data, $binary_signature, $private_key, OPENSSL_ALGO_SHA1);
        $signature = base64_encode($binary_signature);

        return $signature;

    }

    /*
     * function verify chữ ký, dùng để check chữ ký có đúng ko
     * author: Nguyen Tat Loi
     * date: 11/4/2014
     */
    private function verify_sign($data, $sign)
    {
        $public_key = file_get_contents(sfConfig::get('sf_app_dir') . "/config/key/public_key.pem");
        $verify = openssl_verify($data, base64_decode($sign), $public_key, OPENSSL_ALGO_SHA1);
        if($verify == 1){
            return true;
        }else{
            return false;
        }
    }

}
?>