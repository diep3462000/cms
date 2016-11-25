<?php

/**
 * LogWeb form base class.
 *
 * @method LogWeb getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogWebForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'imei'       => new sfWidgetFormInputText(),
      'agent'      => new sfWidgetFormInputText(),
      'brownser'   => new sfWidgetFormInputText(),
      'refer'      => new sfWidgetFormInputText(),
      'ip'         => new sfWidgetFormInputText(),
      'platform'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'imei'       => new sfValidatorString(array('max_length' => 12)),
      'agent'      => new sfValidatorString(array('max_length' => 12)),
      'brownser'   => new sfValidatorString(array('max_length' => 12)),
      'refer'      => new sfValidatorString(array('max_length' => 12)),
      'ip'         => new sfValidatorString(array('max_length' => 12)),
      'platform'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('log_web[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogWeb';
  }

}
