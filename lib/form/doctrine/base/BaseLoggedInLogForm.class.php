<?php

/**
 * LoggedInLog form base class.
 *
 * @method LoggedInLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLoggedInLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logId'        => new sfWidgetFormInputHidden(),
      'userId'       => new sfWidgetFormInputText(),
      'userName'     => new sfWidgetFormInputText(),
      'loggedInTime' => new sfWidgetFormDateTime(),
      'deviceId'     => new sfWidgetFormInputText(),
      'deviceInfo'   => new sfWidgetFormInputText(),
      'remoteIp'     => new sfWidgetFormInputText(),
      'clientType'   => new sfWidgetFormInputText(),
      'packageName'  => new sfWidgetFormInputText(),
      'versionCode'  => new sfWidgetFormInputText(),
      'versionBuild' => new sfWidgetFormInputText(),
      'ipLocked'     => new sfWidgetFormInputText(),
      'reloggedIn'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'logId'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('logId')), 'empty_value' => $this->getObject()->get('logId'), 'required' => false)),
      'userId'       => new sfValidatorPass(array('required' => false)),
      'userName'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'loggedInTime' => new sfValidatorDateTime(),
      'deviceId'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'deviceInfo'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'remoteIp'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'clientType'   => new sfValidatorPass(array('required' => false)),
      'packageName'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'versionCode'  => new sfValidatorPass(array('required' => false)),
      'versionBuild' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'ipLocked'     => new sfValidatorPass(array('required' => false)),
      'reloggedIn'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('logged_in_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LoggedInLog';
  }

}
