<?php

/**
 * pageHome actions.
 *
 * @package    VTP2.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommonActions extends sfActions {

        public function executeIndex(sfWebRequest $request) {

    }
    public function executeDownloadFile(sfWebRequest $request) {
        $i18n = sfContext::getInstance()->getI18N();
        $publisher = sfContext::getInstance()->getUser();

        $id = $request->getParameter('id');
        $this->checkLoginForAjax();
        $file = VtVersionTable::findVersionByPlatform($id);
        if($file){
            $fileName = $file->getlinkDown();
            $path = sfConfig::get('app_upload_file') . '/files/' . $fileName;
            if(is_file($path)){

                try {
                    $user_agent = new phpUserAgent();
                    $vt_download_sdk = new VtDownloadSdk();
                    $vt_download_sdk->setPublisherId($publisher->getMemberId());
                    $vt_download_sdk->setPlatformId($file->getPlatformId());
                    $vt_download_sdk->setVersionId($file->getId());
                    $vt_download_sdk->setIp(VtHelper::getRealIpAddr());
                    $vt_download_sdk->setBrowserName($user_agent->getFullName());
                    $vt_download_sdk->setDevice($user_agent->getOperatingSystem());
                    $vt_download_sdk->setCreatedAt(date('Y-m-d H:i:s', strtotime('now')));
                    $vt_download_sdk->save();
                } catch (phpmailerException $e) {
                    sfContext::getInstance()->getLogger()->log('{Report_Claims} mail exception ' . $e->errorMessage());
                }

                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($path));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($path));
                readfile($path);
                exit;
            } else {
                return $this->renderText(json_encode(array('status' => 'not-exited', 'message' => $i18n->__('File không tồn tại'))));
            }
        }
    }

    public function checkLoginForAjax()
    {
        if(!sfContext::getInstance()->getUser()->isLogin()){
            $hostname = $this->generateUrl("dang_nhap");
            echo "<script>window.location.href = '".$hostname."';</script>";
            exit();
        }else{
            return false;
        }
    }
}
