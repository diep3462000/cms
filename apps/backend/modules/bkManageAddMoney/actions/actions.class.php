<?php

require_once dirname(__FILE__).'/../lib/bkManageAddMoneyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManageAddMoneyGeneratorHelper.class.php';

/**
 * bkManageAddMoney actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManageAddMoney
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManageAddMoneyActions extends autoBkManageAddMoneyActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            $i18n = sfContext::getInstance()->getI18N();
            try {
                $add_money = $form->save();
                    VtActionLogsTable::createActionLogs($form->getObject()->isNew()? BkActions::ACTION_ADDED : BkActions::ACTION_UPDATED, $i18n -> __("[Thêm mới/chỉnh sửa add_money]"), "add_money", $add_money->getId());
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $add_money)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@add_money');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@add_money_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'add_money_edit', 'sf_subject' => $add_money));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
