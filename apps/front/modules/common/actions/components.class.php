<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/12/14
 * Time: 2:02 PM
 * To change this template use File | Settings | File Templates.
 */
class commonComponents extends sfComponents {

    public function executePagging($request) {

    }
    public function executeDownloadFile(sfWebRequest $request) {
        $i18n = sfContext::getInstance()->getI18N();
        $publisher = sfContext::getInstance()->getUser();

        $id = $request->getParameter('id');
        if ($publisher) {
            return $this->renderText(json_encode(array('status' => 'not-signin', 'message' => $i18n->__('Bạn chưa đăng nhập hệ thống, vui lòng đăng nhập để thực hiện tác vụ'))));
        }
        $file = VtVersionTable::findVersionById($id);

        if($file){
            $fileName = $file->getlinkDown();
            $path = sfConfig::get('app_upload_file') . '/api_sdk/' . $fileName;
//            $path = sfConfig::get('app_upload_file') . '/files/almightree_the_last_dreamer.ipa';
//            $fileName = 'almightree_the_last_dreamer.ipa';
            //error_log('test' . mime_content_type ($path));
            if(is_file($path)){
                @header('Content-type: ' .  VtHelper::findReadFile($path));
                @header("Pragma: public");
                @header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                @header('Content-Disposition: attachment; filename="' .  $fileName . '"');
                ob_end_clean();
                ob_start();
                readfile($path);
                $size = ob_get_length();
                header("Content-Length: $size");
                ob_end_flush();
                die;
            } else{
                return $this->renderText(json_encode(array('status' => 'not-exited', 'message' => $i18n->__('File không tồn tại'))));
            }
        }
    }

    /**
     * @author doanpv_os
     * @desc Xử lý menu chung
     * @param sfWebRequest $request
     */
    public function executeMenuHomePage(sfWebRequest $request){
        // Lấy tên module
        $this->mdl = $request->getParameter('module');
        // Lấy list API
        $this->listAPI = VtApiItemTable::getListItemm(VtApiStatus::API_ACTIVE);
        //
        $publisher_id = $this->getUser()->getMemberId();
        $this->listPublisherMessage = VtNotificationTable::getListNoticeByPublisher($publisher_id, 5);
        $this->noticePublisher = VtPublisherMessageTable::getListPublisherMessageNotRead($publisher_id);
        $this->totalNotice = VtNotificationTable::getTotalNoticeNewByPublisher($publisher_id);
    }
}
