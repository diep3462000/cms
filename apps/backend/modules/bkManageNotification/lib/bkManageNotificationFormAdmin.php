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
class bkManageNotificationFormAdmin extends BaseNotificationForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'notificationId' => new sfWidgetFormInputHidden(),
            'title'          => new sfWidgetFormInputText(),
            'message'        => new sfWidgetFormTextarea(),
            'pushHour'       => new sfWidgetFormInputText(),
            'repeat_daily' => new sfWidgetFormChoice(array('choices' => array(0 => "Một lần" , 1 => "lặp lại hàng ngày")), array('add_empty' => true)),
            'status' => new sfWidgetFormChoice(array('choices' => array(0 => "Nháp" , 1 => "Hoạt động")), array('add_empty' => true)),

//            'repeat_daily'   => new sfWidgetFormInputCheckbox(),
//            'status'         => new sfWidgetFormInputCheckbox(),
        ));

        $this->setValidators(array(
            'notificationId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('notificationId')), 'empty_value' => $this->getObject()->get('notificationId'), 'required' => false)),
            'title'          => new sfValidatorString(array('max_length' => 100, 'required' => true)),
            'message'        => new sfValidatorString(array('max_length' => 500)),
            'pushHour'       => new sfValidatorInteger(
                array('required' => true, 'min'=>0, 'max'=>24,'trim' => true),
                array(
                    'min' => $i18n->__('Giờ phải lơn hơn hoặc bằng %min%'),
                    'max' => $i18n->__('Giờ phải nhỏ hơn hoặc bằng %max%'),
                )
            ),
            'repeat_daily'    => new sfValidatorChoice(array(
                'required' => false,
                'choices' => array(0,1)
            )),
            'status'    => new sfValidatorChoice(array(
                'required' => false,
                'choices' => array(0,1)
            )),
//            'repeat_daily'   => new sfValidatorBoolean(array('required' => false)),
//            'status'         => new sfValidatorBoolean(array('required' => false)),
            ));
        $this->setDefault('repeat_daily',false);
        $this->setDefault('status',false);

        $this->widgetSchema->setNameFormat('notification[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}
