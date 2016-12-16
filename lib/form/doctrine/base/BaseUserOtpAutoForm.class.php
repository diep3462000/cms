<?php

/**
 * UserOtpAuto form base class.
 *
 * @method UserOtpAuto getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserOtpAutoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'otpId'       => new sfWidgetFormInputHidden(),
      'userId'      => new sfWidgetFormInputText(),
      'verifyCode'  => new sfWidgetFormInputText(),
      'phoneNumber' => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
      'expiredTime' => new sfWidgetFormDateTime(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'otpId'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('otpId')), 'empty_value' => $this->getObject()->get('otpId'), 'required' => false)),
      'userId'      => new sfValidatorPass(),
      'verifyCode'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'phoneNumber' => new sfValidatorPass(),
      'status'      => new sfValidatorInteger(array('required' => false)),
      'expiredTime' => new sfValidatorDateTime(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_otp_auto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserOtpAuto';
  }

}
