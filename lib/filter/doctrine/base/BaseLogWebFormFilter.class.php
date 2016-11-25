<?php

/**
 * LogWeb filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogWebFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'imei'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'agent'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brownser'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'refer'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ip'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'platform'   => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'imei'       => new sfValidatorPass(array('required' => false)),
      'agent'      => new sfValidatorPass(array('required' => false)),
      'brownser'   => new sfValidatorPass(array('required' => false)),
      'refer'      => new sfValidatorPass(array('required' => false)),
      'ip'         => new sfValidatorPass(array('required' => false)),
      'platform'   => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('log_web_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogWeb';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'imei'       => 'Text',
      'agent'      => 'Text',
      'brownser'   => 'Text',
      'refer'      => 'Text',
      'ip'         => 'Text',
      'platform'   => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
