<?php

/**
 * LuckyWheelItem filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLuckyWheelItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'itemName'    => new sfWidgetFormFilterInput(),
      'round'       => new sfWidgetFormFilterInput(),
      'value'       => new sfWidgetFormFilterInput(),
      'rare'        => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'emotionId'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'itemName'    => new sfValidatorPass(array('required' => false)),
      'round'       => new sfValidatorPass(array('required' => false)),
      'value'       => new sfValidatorPass(array('required' => false)),
      'rare'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'emotionId'   => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lucky_wheel_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LuckyWheelItem';
  }

  public function getFields()
  {
    return array(
      'itemId'      => 'Number',
      'itemName'    => 'Text',
      'round'       => 'Text',
      'value'       => 'Text',
      'rare'        => 'Text',
      'description' => 'Text',
      'emotionId'   => 'Text',
      'status'      => 'Text',
    );
  }
}
