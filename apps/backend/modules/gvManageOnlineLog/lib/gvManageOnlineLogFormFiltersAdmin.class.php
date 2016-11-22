<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseVtpEmailFormFilter
 *
 * @author ngoctv1
 */
class gvManageOnlineLogFormFiltersAdmin extends BaseOnlineLogFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_time = array(6 =>$i18n->__("6 tiếng"), 1 => $i18n->__("1 tiếng"), 2 => $i18n->__("2 tiếng"), 24 =>$i18n->__("Trong ngày"));
        $this->setWidgets(array(
//            'insertedtime' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'option' => new sfWidgetFormChoice(array('choices' => $arr_time), array('add_empty' => true)),
            'insertedtime' => new sfWidgetFormVnDatePicker(array(),array('readonly'=>true)),

        ));

        $this->setValidators(array(
            'option' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_time))),
            'insertedtime' => new sfValidatorDateTime(array('required' => false)),
//            'insertedtime' => new sfValidatorDateRange(array('required' => false,
//                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
//                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));
        $this->widgetSchema['option']->setLabel($i18n->__("Thời gian"));

        $this->widgetSchema->setNameFormat('online_log_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
    public function doBuildQuery(array $values) {
//        $query = parent::doBuildQuery($values);
//        return $query;
    }
}
