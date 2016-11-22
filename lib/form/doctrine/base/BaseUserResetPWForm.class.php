<?php

/**
 * UserResetPW form base class.
 *
 * @method UserResetPW getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserResetPWForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputText(),
      'verify_code'  => new sfWidgetFormInputText(),
      'expried_time' => new sfWidgetFormInputText(),
      'mo_id'        => new sfWidgetFormTextarea(),
      'msisdn'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'      => new sfValidatorPass(),
      'verify_code'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'expried_time' => new sfValidatorInteger(),
      'mo_id'        => new sfValidatorString(array('max_length' => 256)),
      'msisdn'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_reset_pw[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserResetPW';
  }

}
