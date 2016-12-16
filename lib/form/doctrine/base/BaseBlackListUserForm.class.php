<?php

/**
 * BlackListUser form base class.
 *
 * @method BlackListUser getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBlackListUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blackListId' => new sfWidgetFormInputHidden(),
      'userId'      => new sfWidgetFormInputText(),
      'userLockId'  => new sfWidgetFormInputText(),
      'lockTime'    => new sfWidgetFormDateTime(),
      'ipLocked'    => new sfWidgetFormInputText(),
      'reason'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'blackListId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('blackListId')), 'empty_value' => $this->getObject()->get('blackListId'), 'required' => false)),
      'userId'      => new sfValidatorPass(array('required' => false)),
      'userLockId'  => new sfValidatorPass(array('required' => false)),
      'lockTime'    => new sfValidatorDateTime(),
      'ipLocked'    => new sfValidatorPass(array('required' => false)),
      'reason'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('black_list_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlackListUser';
  }

}
