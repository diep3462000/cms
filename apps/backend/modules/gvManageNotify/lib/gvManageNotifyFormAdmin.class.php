<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gvManageGameFormAdmin
 *
 * @author ngoctv1
 */
class gvManageNotifyFormAdmin extends BaseNotifyForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();

        $this->setWidgets(array(
            'content'    => new sfWidgetFormCKEditor(
                array(
                    'jsoptions' => array('toolbar' => 'Basic',
                        'width' => '700',
                        'height' => '200'),
                )),
            'status'     => new sfWidgetFormInputCheckbox(),
        ));

        $this->setValidators(array(
            'content'   => new sfValidatorString(array('max_length' => 40000, 'required' => false)),
            'status'     => new sfValidatorBoolean(),
        ));


        $this->widgetSchema->setNameFormat('notify[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
        
    }

}

