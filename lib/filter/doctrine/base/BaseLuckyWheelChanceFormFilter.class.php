<?php

/**
 * LuckyWheelChance filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLuckyWheelChanceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userId'      => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'round1_item' => new sfWidgetFormFilterInput(),
      'round2_item' => new sfWidgetFormFilterInput(),
      'time'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'userId'      => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'round1_item' => new sfValidatorPass(array('required' => false)),
      'round2_item' => new sfValidatorPass(array('required' => false)),
      'time'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('lucky_wheel_chance_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LuckyWheelChance';
  }

  public function getFields()
  {
    return array(
      'logId'       => 'Number',
      'userId'      => 'Text',
      'description' => 'Text',
      'round1_item' => 'Text',
      'round2_item' => 'Text',
      'time'        => 'Date',
    );
  }
}
