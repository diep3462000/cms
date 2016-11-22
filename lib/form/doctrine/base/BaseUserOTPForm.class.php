<?php

/**
 * UserOTP form base class.
 *
 * @method UserOTP getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserOTPForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputText(),
      'verify_code'  => new sfWidgetFormInputText(),
      'expried_time' => new sfWidgetFormDateTime(),
      'mo_id'        => new sfWidgetFormTextarea(),
      'msisdn'       => new sfWidgetFormInputText(),
      'type'         => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'      => new sfValidatorPass(),
      'verify_code'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'expried_time' => new sfValidatorDateTime(),
      'mo_id'        => new sfValidatorString(array('max_length' => 256)),
      'msisdn'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'type'         => new sfValidatorPass(array('required' => false)),
      'status'       => new sfValidatorInteger(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_otp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserOTP';
  }

}
