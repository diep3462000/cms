<?php

/**
 * GiftEvent form base class.
 *
 * @method GiftEvent getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGiftEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'giftEventId' => new sfWidgetFormInputHidden(),
      'eventName'   => new sfWidgetFormInputText(),
      'cashValue'   => new sfWidgetFormInputText(),
      'goldValue'   => new sfWidgetFormInputText(),
      'expiredTime' => new sfWidgetFormDateTime(),
      'reuseable'   => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'giftEventId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('giftEventId')), 'empty_value' => $this->getObject()->get('giftEventId'), 'required' => false)),
      'eventName'   => new sfValidatorString(array('max_length' => 250)),
      'cashValue'   => new sfValidatorInteger(array('required' => false)),
      'goldValue'   => new sfValidatorInteger(array('required' => false)),
      'expiredTime' => new sfValidatorDateTime(array('required' => false)),
      'reuseable'   => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'status'      => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('gift_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftEvent';
  }

}
