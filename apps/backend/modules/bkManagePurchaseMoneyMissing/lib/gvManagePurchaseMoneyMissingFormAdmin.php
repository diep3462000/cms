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
class gvManagePurchaseMoneyMissingFormAdmin extends BasePurchaseMoneyMissingForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_status = array("" => $i18n->__("Chọn nhà cung cấp"), "VTT" => $i18n->__("Viettel"), "VMS" => $i18n->__("Mobifone") ,"VNP" => $i18n->__("Vinaaphone"),
            "VNMB" => $i18n->__("VietNam Mobile"), "MGC" => $i18n->__("MegaCard") );
        $this->setWidgets(array(
            'userId'     => new sfWidgetFormInputText(),
            'provider' => new sfWidgetFormChoice(array('choices' => $arr_status), array('add_empty' => true)),
            'cardSerial' => new sfWidgetFormInputText(),
            'cardPin'    => new sfWidgetFormInputText(),
            'cardValue'  => new sfWidgetFormInputText(),
            'toCash'     => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'userId'     => new sfValidatorInteger(array('required' => false)),
            'provider'   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
            'provider' => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arr_status))),
            'cardSerial' => new sfValidatorString(array('max_length' => 32, 'required' => true)),
            'cardPin'    => new sfValidatorString(array('max_length' => 32, 'required' => true)),
            'cardValue'          => new sfValidatorInteger(array('required' => true, "min"=>0, 'max'=>500000,'trim' => true), array('min'=>$i18n->__('Giá trị thẻ nạp phải là số nguyên dương'),'max'=>$i18n->__('Tối đa 500.000'),'invalid'=> $i18n->__('Thứ tự phải là số nguyên dương'))),
            'toCash'          => new sfValidatorInteger(array('required' => true, "min"=>0, 'max'=>500000,'trim' => true), array('min'=>$i18n->__('Giá trị phải là số nguyên dương'),'max'=>$i18n->__('Tối đa 500.000'),'invalid'=> $i18n->__('Thứ tự phải là số nguyên dương'))),

        ));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));

        $this->widgetSchema->setNameFormat('purchase_money_missing[%s]');

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
            $values['active'] = 0;
            $values["admin_id"] = sfContext::getInstance()->getUser()->getGuardUser()->getId();
        }
        if ($arrayError)
            throw new sfValidatorErrorSchema($validator, $arrayError);
        return $values;
    }

}
