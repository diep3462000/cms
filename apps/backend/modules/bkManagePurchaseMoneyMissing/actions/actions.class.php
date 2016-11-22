<?php

require_once dirname(__FILE__).'/../lib/bkManagePurchaseMoneyMissingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManagePurchaseMoneyMissingGeneratorHelper.class.php';

/**
 * bkManagePurchaseMoneyMissing actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManagePurchaseMoneyMissing
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManagePurchaseMoneyMissingActions extends autoBkManagePurchaseMoneyMissingActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            $i18n = sfContext::getInstance()->getI18N();
            try {
                $purchase_money_missing = $form->save();
                VtActionLogsTable::createActionLogs($form->getObject()->isNew()? BkActions::ACTION_ADDED : BkActions::ACTION_UPDATED, $i18n -> __("[Thêm mới/chỉnh sửa add_money]"), "purchase_money_missing", $purchase_money_missing->getMissId());
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $purchase_money_missing)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@purchase_money_missing');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@purchase_money_missing_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'purchase_money_missing_edit', 'sf_subject' => $purchase_money_missing));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
