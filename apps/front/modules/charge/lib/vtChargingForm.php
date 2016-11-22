<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageVtNotificationFormsAdmin
 *
 * @author diepth2
 */
class vtChargingForm extends BaseForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arrayTelco = CardProviderTable::getListProviderSelectBox();
        $this->setWidgets(array(
            'user_id'         => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__("Id trong game"), 'maxlength' => 15)),
            'serial'         => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__("Nhập chuỗi số in trên thẻ cào."), 'maxlength' => 15)),
            'card_code'     => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => $i18n->__("Nhập chuỗi số dưới lớp bạc."), 'maxlength' => 15)),
            'telco_code'       => new sfWidgetFormChoice(array('choices' => $arrayTelco), array('class' => 'form-control')),
            'captcha'       => new sfWidgetCaptchaGD(array(), array('class' => 'col-sm-6', 'placeholder' => $i18n->__("Mã xác nhận")))
        ));
        $this->setValidators(array(
            'telco_code'    => new sfValidatorChoice(array('choices' => array_keys($arrayTelco), 'required' => false), array()),
            'user_id'         => new sfValidatorAnd(
                array(
                    new sfValidatorString(array('max_length' => 8, 'min_length' => 5, 'required' => true, 'trim' => true),
                        array('required' => $i18n->__('Bạn chưa nhập Id game.'),
                            'max_length' => $i18n->__('Id tối đa %max_length% ký tự.'),
                            'min_length' => $i18n->__("Id tối thiểu %min_length% ký tự.")
                        )
                    ),
                    new sfValidatorRegex(
                        array('pattern' =>   '/^[0-9]+$/'),
                        array('invalid' => $i18n->__('Id chỉ bao gồm các ký tự 0-9.'))
                    )
                )
            ),
            'serial'         => new sfValidatorAnd(
                array(
                    new sfValidatorString(array('max_length' => 15, 'min_length' => 11, 'required' => true, 'trim' => true),
                        array('required' => $i18n->__('Bạn chưa nhập chuỗi số in trên thẻ cào.'),
                            'max_length' => $i18n->__('Serial tối đa %max_length% ký tự.'),
                            'min_length' => $i18n->__("Serial tối thiểu %min_length% ký tự.")
                        )
                    ),
                    new sfValidatorRegex(
                        array('pattern' =>   '/^[0-9]+$/'),
                        array('invalid' => $i18n->__('Serial chỉ bao gồm các ký tự 0-9.'))
                    )
                )
            ),
            'card_code'     => new sfValidatorAnd(
                array(
                    new sfValidatorString(array('max_length' => 15, 'min_length' => 13, 'required' => true, 'trim' => true),
                        array('required' => $i18n->__('Bạn chưa nhập chuỗi số dưới lớp bạc.'),
                            'max_length' => $i18n->__('Mã thẻ tối đa %max_length% ký tự.') ,
                            'min_length' => $i18n->__("Mã thẻ tối thiểu %min_length% ký tự.")
                        )
                    ),
                    new sfValidatorRegex(
                        array('pattern' =>   '/^[0-9]+$/'),
                        array('invalid' => $i18n->__('Mã thẻ chỉ bao gồm các ký tự 0-9.'))
                    )
                )
            ),
            'captcha'       => new sfCaptchaGDValidator(array('trim' => true),
                array(
                    'invalid'       => $i18n->__('Mã xác nhận không chính xác.'),
                    'required'      => $i18n->__('Bạn chưa nhập mã xác nhận.'),
                )
            ),
        ));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkValidator'))));

        $this->widgetSchema->setNameFormat('vt_charging[%s]');
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
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

        if ($values['user_id'] != null){
            if (!UserTable::getUserByUserId($values['user_id'])){
                $arrayError['user_id'] = new sfValidatorError($validator, $i18n->__('Thông tin người chơi không tồn tại'));
            }
        }
        if ($arrayError)
            throw new sfValidatorErrorSchema($validator, $arrayError);
        return $values;
    }


}
