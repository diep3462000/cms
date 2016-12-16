<?php

/**
 * LuckyWheelItem form base class.
 *
 * @method LuckyWheelItem getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLuckyWheelItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'itemId'      => new sfWidgetFormInputHidden(),
      'itemName'    => new sfWidgetFormTextarea(),
      'round'       => new sfWidgetFormInputText(),
      'value'       => new sfWidgetFormInputText(),
      'rare'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'emotionId'   => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'itemId'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('itemId')), 'empty_value' => $this->getObject()->get('itemId'), 'required' => false)),
      'itemName'    => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'round'       => new sfValidatorPass(array('required' => false)),
      'value'       => new sfValidatorPass(array('required' => false)),
      'rare'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'emotionId'   => new sfValidatorPass(),
      'status'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lucky_wheel_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LuckyWheelItem';
  }

}
