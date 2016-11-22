<?php
/**
 * pageHome actions.
 *
 * @package    Bigken.0
 * @subpackage pageHome
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AjaxActions extends sfActions
{
    public function executeCheckUserExited(sfWebRequest $request){
        // $this->checkLoginForAjax();
        //
        $i18n = sfContext::getInstance()->getI18N();
        $form = new BaseForm();
        $token = $request->getParameter('token',0);
        $user_id = $request->getParameter('user_id',1);

        if ($form->getCSRFToken() != $token){
//            return $this->renderText(json_encode(array('status' => -1, 'notice' => $i18n->__('Giá trị token không hợp lệ.' . $token . '---' . $form->getCSRFToken()))));
        }
        $i18n = sfContext::getInstance()->getI18N();
        $user = UserTable::getUserByUserId($user_id);
        if(!$user){
            return $this->renderText(json_encode(array('status' => 0,'notice' => $i18n->__('User không tồn tại'))));
        } else {
            return $this->renderText(json_encode(array('status' => 1,'display_name' => $user->getDisplayName(), 'notice' => $i18n->__('User không tồn tại'))));
        }
    }
}