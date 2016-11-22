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
class gvManageGiftCodeFormAdmin extends BaseGiftCodeForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();

        $this->setWidgets(array(
            'giftEventId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'add_empty' => false)),
            'userId'      => new sfWidgetFormInputText(),
            'userName'    => new sfWidgetFormInputText(),
            'expiredTime' => new sfWidgetFormVnDatePicker(array(),array('readonly'=>true)),
            'status'      => new sfWidgetFormInputText(),
            'ip'          => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'giftEventId' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'required' => false)),
            'userId'      => new sfValidatorInteger(array('required' => false)),
            'userName'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
            'expiredTime' => new sfValidatorDateTime(array('required' => false)),
            'status'      => new sfValidatorInteger(array('required' => false)),
            'ip'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
            'description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('gift_event[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

}
