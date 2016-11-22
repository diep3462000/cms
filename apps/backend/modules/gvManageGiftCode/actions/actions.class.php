<?php

require_once dirname(__FILE__).'/../lib/gvManageGiftCodeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gvManageGiftCodeGeneratorHelper.class.php';

/**
 * gvManageGiftCode actions.
 *
 * @package    Vt_Portals
 * @subpackage gvManageGiftCode
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gvManageGiftCodeActions extends autoGvManageGiftCodeActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        $values =$request->getParameter($this->form->getName());

        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $is_new = $form->getObject()->isNew();
                if($is_new){
                    $gift_code = new GiftCode();
                    $gift_code->setCode(VtHelper::genRandomNumber(4));
                    $gift_event = GiftEventTable::getEventById($values['giftEventId']);
                    $gift_code->setUserId($values["userId"]);
                    $gift_code->setReuseable(0);
                    $gift_code->setCashValue($gift_event->getCashValue());
                    $gift_code->setExpiredTime(VtHelper::reFormatDate($values["expiredTime"]["date"], "Y-m-d H:i:s"));
                    $gift_code->setGoldValue($gift_event->getGoldValue());
                    $gift_code->setGiftEventId($values['giftEventId']);
                    $gift_code->setDescription($values['description']);
                    $gift_code->save();
                }
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $gift_code)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@gift_code');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@gift_code_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'gift_code_edit', 'sf_subject' => $gift_code));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
