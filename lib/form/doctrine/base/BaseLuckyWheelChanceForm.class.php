<?php

/**
 * LuckyWheelChance form base class.
 *
 * @method LuckyWheelChance getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLuckyWheelChanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logId'       => new sfWidgetFormInputHidden(),
      'userId'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'round1_item' => new sfWidgetFormInputText(),
      'round2_item' => new sfWidgetFormInputText(),
      'time'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'logId'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('logId')), 'empty_value' => $this->getObject()->get('logId'), 'required' => false)),
      'userId'      => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'round1_item' => new sfValidatorPass(array('required' => false)),
      'round2_item' => new sfValidatorPass(array('required' => false)),
      'time'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('lucky_wheel_chance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LuckyWheelChance';
  }

}
