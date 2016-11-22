<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageChargAmountFormAdmin
 *
 * @author diepth2
 */
class gvManageGiftEventFormAdmin extends BaseGiftEventForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'eventName'   => new sfWidgetFormInputText(),
            'cashValue'   => new sfWidgetFormInputText(),
            'goldValue'   => new sfWidgetFormInputText(),
            'expiredTime' => new sfWidgetFormDateTime(),
            'reuseable'   => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormInputText(),
            'status'      => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'eventName'   => new sfValidatorString(array('max_length' => 250)),
            'cashValue'   => new sfValidatorInteger(array('required' => false)),
            'goldValue'   => new sfValidatorInteger(array('required' => false)),
            'expiredTime' => new sfValidatorDateTime(array('required' => false)),
            'reuseable'   => new sfValidatorInteger(array('required' => false)),
            'description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
            'status'      => new sfValidatorInteger(array('required' => false)),
        ));
        $this->widgetSchema->setNameFormat('gift_event[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

}
