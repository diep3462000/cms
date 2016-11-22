<?php

/**
 * MoResult filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMoResultFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mo_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userId'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userName' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'mo_id'    => new sfValidatorPass(array('required' => false)),
      'amount'   => new sfValidatorPass(array('required' => false)),
      'userId'   => new sfValidatorPass(array('required' => false)),
      'userName' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mo_result_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoResult';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Text',
      'mo_id'    => 'Text',
      'amount'   => 'Text',
      'userId'   => 'Text',
      'userName' => 'Text',
    );
  }
}
