<?php

require_once dirname(__FILE__).'/../lib/bkManageTaiGameGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManageTaiGameGeneratorHelper.class.php';

/**
 * bkManageTaiGame actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManageTaiGame
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManageTaiGameActions extends autoBkManageTaiGameActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        ini_set('max_execution_time', 3000);
        ini_set('memory_limit', '-1');
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $value=$form->getValues();
                $tai_game = $form->save();
                if(isset($value['file_down'])){
                    $name = $tai_game->file_down;
                    $or_name = time() . '_' . $value['file_down']->getOriginalName();
                    rename(sfConfig::get('app_upload_file') . '/files/' . $name , sfConfig::get('app_upload_file') . '/files/' . $or_name);
                    $tai_game->setFileDown($or_name);
                    $tai_game->save();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $tai_game)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@tai_game');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@tai_game_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'tai_game_edit', 'sf_subject' => $tai_game));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
