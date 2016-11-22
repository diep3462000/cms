<?php

/**
 * UserInfo form base class.
 *
 * @method UserInfo getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userid'                 => new sfWidgetFormInputHidden(),
      'status'                 => new sfWidgetFormInputText(),
      'username'               => new sfWidgetFormInputText(),
      'isonline'               => new sfWidgetFormInputText(),
      'clientid'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'add_empty' => false)),
      'ip'                     => new sfWidgetFormInputText(),
      'device'                 => new sfWidgetFormInputText(),
      'screen'                 => new sfWidgetFormInputText(),
      'currentgameid'          => new sfWidgetFormInputText(),
      'experience'             => new sfWidgetFormInputText(),
      'totalmatch'             => new sfWidgetFormInputText(),
      'totalwin'               => new sfWidgetFormInputText(),
      'playedgame'             => new sfWidgetFormInputText(),
      'startplayedtime'        => new sfWidgetFormDateTime(),
      'cp'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'add_empty' => true)),
      'deviceidentify'         => new sfWidgetFormInputText(),
      'gold'                   => new sfWidgetFormInputText(),
      'cash'                   => new sfWidgetFormInputText(),
      'level'                  => new sfWidgetFormInputText(),
      'medal'                  => new sfWidgetFormInputText(),
      'trustedindex'           => new sfWidgetFormInputText(),
      'avatarid'               => new sfWidgetFormInputText(),
      'autoready'              => new sfWidgetFormInputText(),
      'autodenyinvitation'     => new sfWidgetFormInputText(),
      'lastlogintime'          => new sfWidgetFormDateTime(),
      'verified'               => new sfWidgetFormInputText(),
      'verifiedPhone'          => new sfWidgetFormInputText(),
      'verifiedEmail'          => new sfWidgetFormInputText(),
      'disableCashTransaction' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'userid'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('userid')), 'empty_value' => $this->getObject()->get('userid'), 'required' => false)),
      'status'                 => new sfValidatorInteger(array('required' => false)),
      'username'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'isonline'               => new sfValidatorInteger(array('required' => false)),
      'clientid'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'required' => false)),
      'ip'                     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'device'                 => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'screen'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'currentgameid'          => new sfValidatorInteger(array('required' => false)),
      'experience'             => new sfValidatorInteger(array('required' => false)),
      'totalmatch'             => new sfValidatorInteger(array('required' => false)),
      'totalwin'               => new sfValidatorInteger(array('required' => false)),
      'playedgame'             => new sfValidatorInteger(array('required' => false)),
      'startplayedtime'        => new sfValidatorDateTime(array('required' => false)),
      'cp'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'required' => false)),
      'deviceidentify'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'gold'                   => new sfValidatorInteger(array('required' => false)),
      'cash'                   => new sfValidatorInteger(array('required' => false)),
      'level'                  => new sfValidatorInteger(array('required' => false)),
      'medal'                  => new sfValidatorInteger(array('required' => false)),
      'trustedindex'           => new sfValidatorInteger(array('required' => false)),
      'avatarid'               => new sfValidatorInteger(array('required' => false)),
      'autoready'              => new sfValidatorInteger(array('required' => false)),
      'autodenyinvitation'     => new sfValidatorInteger(array('required' => false)),
      'lastlogintime'          => new sfValidatorDateTime(array('required' => false)),
      'verified'               => new sfValidatorInteger(array('required' => false)),
      'verifiedPhone'          => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'verifiedEmail'          => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'disableCashTransaction' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserInfo';
  }

}
