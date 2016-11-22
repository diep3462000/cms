<?php

/**
 * GiftCode form base class.
 *
 * @method GiftCode getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGiftCodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'giftId'      => new sfWidgetFormInputHidden(),
      'giftEventId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'add_empty' => false)),
      'userId'      => new sfWidgetFormInputText(),
      'userName'    => new sfWidgetFormInputText(),
      'cashValue'   => new sfWidgetFormInputText(),
      'goldValue'   => new sfWidgetFormInputText(),
      'code'        => new sfWidgetFormInputText(),
      'expiredTime' => new sfWidgetFormDateTime(),
      'reuseable'   => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'ip'          => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'giftId'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('giftId')), 'empty_value' => $this->getObject()->get('giftId'), 'required' => false)),
      'giftEventId' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'required' => false)),
      'userId'      => new sfValidatorInteger(array('required' => false)),
      'userName'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cashValue'   => new sfValidatorInteger(array('required' => false)),
      'goldValue'   => new sfValidatorInteger(array('required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 20)),
      'expiredTime' => new sfValidatorDateTime(array('required' => false)),
      'reuseable'   => new sfValidatorInteger(array('required' => false)),
      'status'      => new sfValidatorInteger(array('required' => false)),
      'ip'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'GiftCode', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('gift_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftCode';
  }

}
