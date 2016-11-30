<?php

require_once dirname(__FILE__).'/../lib/bkManageWebContentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManageWebContentGeneratorHelper.class.php';

/**
 * bkManageWebContent actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManageWebContent
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManageWebContentActions extends autoBkManageWebContentActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {

                $web_content = $form->save();

                $slug=removeSignClass::removeSign($web_content->title);

                if($slug==''){
                    $slug=VtHelper::generateString(5);
                }
                $objCat = WebContentTable::checkSlug($slug,$web_content->id);
                while ($objCat>0){
                    $slug=$slug.'-'.VtHelper::generateString(5);
                    $objCat = WebContentTable::checkSlug($slug,$web_content->id);
                }
                $web_content->slug=$slug;
                $web_content->save();

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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $web_content)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@web_content');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@web_content_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'web_content_edit', 'sf_subject' => $web_content));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
