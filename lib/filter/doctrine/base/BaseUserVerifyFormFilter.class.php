<?php

/**
 * UserVerify filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserVerifyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'verify_code'  => new sfWidgetFormFilterInput(),
      'expried_time' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mo_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'msisdn'       => new sfWidgetFormFilterInput(),
      'type'         => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorPass(array('required' => false)),
      'verify_code'  => new sfValidatorPass(array('required' => false)),
      'expried_time' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mo_id'        => new sfValidatorPass(array('required' => false)),
      'msisdn'       => new sfValidatorPass(array('required' => false)),
      'type'         => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_verify_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserVerify';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'Text',
      'verify_code'  => 'Text',
      'expried_time' => 'Number',
      'mo_id'        => 'Text',
      'msisdn'       => 'Text',
      'type'         => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
