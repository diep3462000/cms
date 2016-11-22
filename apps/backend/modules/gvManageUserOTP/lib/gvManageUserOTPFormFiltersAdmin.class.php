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
class gvManageUserOTPFormFiltersAdmin extends BaseUserOTPFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_top = array("" => $i18n->__("Mới nhất"), 1 => $i18n->__("Level"), 2 => $i18n->__("Đại gia Ken"), 3 => $i18n->__("Đại gia Xu"), 4 => $i18n->__("Số ván chơi"),
            5 => $i18n->__("Số ván thắng"), 6 => $i18n->__("Top nạp thẻ"));
        $this->setWidgets(array(
            'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'verify_code'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'expried_time' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'mo_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'msisdn'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'type'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'user_id'      => new sfValidatorPass(array('required' => false)),
            'verify_code'  => new sfValidatorPass(array('required' => false)),
            'expried_time' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'mo_id'        => new sfValidatorPass(array('required' => false)),
            'msisdn'       => new sfValidatorPass(array('required' => false)),
            'type'         => new sfValidatorPass(array('required' => false)),
            'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));


//        $this->widgetSchema->setNameFormat('gv_user_filters[%s]');
//        $this->widgetSchema['lastLoginTime']->setLabel($i18n->__("Lần cuối đăng nhập"));
//        $this->widgetSchema['device']->setLabel($i18n->__("IME"));

        $this->widgetSchema->setNameFormat('user_otp_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }
    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->orderBy("created_at desc");
        return $query;
    }

}
