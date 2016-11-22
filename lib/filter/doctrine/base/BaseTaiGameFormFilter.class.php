<?php

/**
 * TaiGame filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaiGameFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'OS'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'link_tai'      => new sfWidgetFormFilterInput(),
      'file_down'     => new sfWidgetFormFilterInput(),
      'is_direct'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'count'         => new sfWidgetFormFilterInput(),
      'version_build' => new sfWidgetFormFilterInput(),
      'platform_icon' => new sfWidgetFormFilterInput(),
      'status'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'OS'            => new sfValidatorPass(array('required' => false)),
      'link_tai'      => new sfValidatorPass(array('required' => false)),
      'file_down'     => new sfValidatorPass(array('required' => false)),
      'is_direct'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'count'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version_build' => new sfValidatorPass(array('required' => false)),
      'platform_icon' => new sfValidatorPass(array('required' => false)),
      'status'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('tai_game_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaiGame';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'OS'            => 'Text',
      'link_tai'      => 'Text',
      'file_down'     => 'Text',
      'is_direct'     => 'Number',
      'count'         => 'Number',
      'version_build' => 'Text',
      'platform_icon' => 'Text',
      'status'        => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
