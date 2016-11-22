<?php

/**
 * MoHistory filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMoHistoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mo_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transdate'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shortcode'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'keyword'      => new sfWidgetFormFilterInput(),
      'content'      => new sfWidgetFormFilterInput(),
      'telco'        => new sfWidgetFormFilterInput(),
      'status'       => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'mo_id'        => new sfValidatorPass(array('required' => false)),
      'phone_number' => new sfValidatorPass(array('required' => false)),
      'user_id'      => new sfValidatorPass(array('required' => false)),
      'amount'       => new sfValidatorPass(array('required' => false)),
      'transdate'    => new sfValidatorPass(array('required' => false)),
      'shortcode'    => new sfValidatorPass(array('required' => false)),
      'keyword'      => new sfValidatorPass(array('required' => false)),
      'content'      => new sfValidatorPass(array('required' => false)),
      'telco'        => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('mo_history_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoHistory';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Text',
      'mo_id'        => 'Text',
      'phone_number' => 'Text',
      'user_id'      => 'Text',
      'amount'       => 'Text',
      'transdate'    => 'Text',
      'shortcode'    => 'Text',
      'keyword'      => 'Text',
      'content'      => 'Text',
      'telco'        => 'Text',
      'status'       => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
