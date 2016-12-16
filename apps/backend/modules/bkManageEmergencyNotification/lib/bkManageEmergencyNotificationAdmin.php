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
class bkManageEmergencyNotificationAdmin extends BaseEmergencyNotificationForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();

        $this->setWidgets(array(
            'content'        => new sfWidgetFormTextarea(),
//            'createdTime' => new sfWidgetFormDatePickerTime(array(),array('readonly'=>true)),
            'createdTime' => new sfWidgetFormDatePickerTime(array(),array('readonly'=>true)),
            'expriedTime' => new sfWidgetFormDatePickerTime(array(),array('readonly'=>true)),
            'active'         => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'content'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
            'createdTime'    => new sfValidatorDateTime(),
            'expriedTime'    => new sfValidatorDateTime(),
            'active'         => new sfValidatorPass(array('required' => false)),
        ));


        $this->widgetSchema->setNameFormat('emergency_notification[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}
