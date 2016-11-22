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
class gvManageAddMoneyFormAdmin extends BaseAddMoneyForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'userId'      => new sfWidgetFormInputText(),
            'addCash'     => new sfWidgetFormInputText(),
            'addGold'     => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormTextarea(),
            'admin_id'    => new sfWidgetFormInputText(),
            'status'      => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'userId'      => new sfValidatorInteger(array('required' => true)),
            'addCash'     => new sfValidatorInteger(array('required' => false)),
            'addGold'     => new sfValidatorInteger(array('required' => false)),
            'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'admin_id'    => new sfValidatorInteger(array('required' => false)),
            'status'      => new sfValidatorInteger(array('required' => false)),
        ));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));
//        $this->setDefault('admin_id', sfContext::getInstance()->getUser()->getGuardUser()->getUsername());

        $this->widgetSchema->setNameFormat('add_money[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
    public function checkValidator($validator, $values){

        $i18n = sfContext::getInstance()->getI18N();
        $arrayError = array();
//        if($values['prioty'] && $values['prioty'] <=0){
//            $arrayError['prioty'] = new sfValidatorError($validator,$i18n->__('Độ ưu tiên bắt buộc phải là số nguyên dương'));
//        }
//        if ($values['start_time']!= null && $values['end_time']!= null){
//            if (strtotime($values['start_time']) > strtotime($values['end_time'])){
//                $arrayError['end_time'] = new sfValidatorError($validator,$i18n->__('Thời gian kết thúc phải lớn hơn hoặc bằng ngày thông báo.'));
//            }
//        }
//        if($values['start_time'] > $values['end_time']){
//            $arrayError['end_time'] = new sfValidatorError($validator,$i18n->__('Thời gian bắt đầu phải nhỏ hơn hoặc bằng Thời gian kết thúc'));
//        }

        if ($values['userId'] != null){
            if (!UserTable::getUserByUserId($values['userId'])){
                $arrayError['userId'] = new sfValidatorError($validator, $i18n->__('Thông tin người chơi không tồn tại'));
            }
        }
        if($this->isNew()){
            $values['status'] = 0;
        }
        $values["admin_id"] = sfContext::getInstance()->getUser()->getGuardUser()->getId();
        if ($arrayError)
            throw new sfValidatorErrorSchema($validator, $arrayError);
        return $values;
    }

}
