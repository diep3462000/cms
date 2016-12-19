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
            'active' => new sfWidgetFormChoice(array('choices' => array(0 => "Tạo mới" , 1 => "Hoạt động")), array('add_empty' => true)),
        ));

        $this->setValidators(array(
            'content'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
            'createdTime'    => new sfValidatorDateTime(),
            'expriedTime'    => new sfValidatorDateTime(),
            'active'    => new sfValidatorChoice(array(
                    'required' => false,
                    'choices' => array(0,1)
                ))
        ));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));

        $this->widgetSchema->setNameFormat('emergency_notification[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

    public function checkValidator($validator, $values){

        $i18n = sfContext::getInstance()->getI18N();
        $arrayError = array();
        if ($values['createdTime']!= null && $values['expriedTime']!= null){
//            var_dump(strtotime($values['createdTime']) . "|" . strtotime($values['expriedTime']))
//                        ;die;
            if (strtotime($values['createdTime']) > strtotime($values['expriedTime'])){
                $arrayError['expriedTime'] = new sfValidatorError($validator,$i18n->__('Thời gian kết thúc phải lớn hơn hoặc bằng ngày thông báo.'));
            }
        }
        if ($arrayError)
            throw new sfValidatorErrorSchema($validator, $arrayError);
        return $values;
    }

}
