.<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseVtpEmailFormFilter
 *
 * @author ngoctv1
 */
class bkManageLogPaymentFormFiltersAdmin extends BaseLogPaymentFormFilter
{
    public function configure()
    {
        $this->setWidgets(array(
            'userid'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'seria'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'pin_card'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'providerId'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'money'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'type'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'message'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'content'      => new sfWidgetFormFilterInput(),
            'request_time' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'userid'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'seria'        => new sfValidatorPass(array('required' => false)),
            'pin_card'     => new sfValidatorPass(array('required' => false)),
            'providerId'   => new sfValidatorPass(array('required' => false)),
            'money'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'type'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'status'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'message'      => new sfValidatorPass(array('required' => false)),
            'content'      => new sfValidatorPass(array('required' => false)),
            'request_time' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('log_payment_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
}
