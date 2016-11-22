<?php

/**
 * TaxDailyStatictis filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaxDailyStatictisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
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

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxDailyStatictis';
  }

  public function getFields()
  {
    return array(
      'taxId'        => 'Number',
      'day'          => 'Date',
      'gameId'       => 'Number',
      'taxValue'     => 'Number',
      'isCash'       => 'Number',
      'insertedTime' => 'Date',
    );
  }
}
