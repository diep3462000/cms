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
class gvManageGameFormAdmin extends BaseGameForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'gameid'      => new sfWidgetFormInputHidden(),
            'name'        => new sfWidgetFormInputText(),
            'description'    => new sfWidgetFormCKEditor(
                array(
                    'jsoptions' => array('toolbar' => 'Basic',
                        'width' => '700',
                        'height' => '200'),
                )),
            'help'        => new sfWidgetFormTextarea(),
            'status'      => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'gameid'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('gameid')), 'empty_value' => $this->getObject()->get('gameid'), 'required' => false)),
            'name'        => new sfValidatorString(array('max_length' => 50)),
            'description' => new sfValidatorString(array('max_length' => 40000, 'required' => false)),
            'help'        => new sfValidatorString(array('max_length' => 40000, 'required' => false)),
            'status'      => new sfValidatorInteger(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('game[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
        $this->setupInheritance();
    }
}

