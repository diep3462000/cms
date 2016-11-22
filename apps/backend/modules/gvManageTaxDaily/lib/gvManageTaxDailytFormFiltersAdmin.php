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
class gvManageTaxDailytFormFiltersAdmin extends BaseTaxDailyStatictisFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_status = array("" => $i18n->__("Tất cả"), 1 => $i18n->__("Xu"), 2 => $i18n->__("Ken"));
        $this->setWidgets(array(
            'day'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'gameId'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'taxValue'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'isCash'       => new sfWidgetFormFilterInput(),
            'insertedTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'day'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'gameId'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'taxValue'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'isCash'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'insertedTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('tax_daily_statictis_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
    }

}
