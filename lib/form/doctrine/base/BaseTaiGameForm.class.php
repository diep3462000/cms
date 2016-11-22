<?php

/**
 * TaiGame form base class.
 *
 * @method TaiGame getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaiGameForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'OS'            => new sfWidgetFormInputText(),
      'link_tai'      => new sfWidgetFormTextarea(),
      'file_down'     => new sfWidgetFormTextarea(),
      'is_direct'     => new sfWidgetFormInputText(),
      'count'         => new sfWidgetFormInputText(),
      'version_build' => new sfWidgetFormTextarea(),
      'platform_icon' => new sfWidgetFormTextarea(),
      'status'        => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'OS'            => new sfValidatorString(array('max_length' => 12)),
      'link_tai'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'file_down'     => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'is_direct'     => new sfValidatorInteger(),
      'count'         => new sfValidatorInteger(array('required' => false)),
      'version_build' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'platform_icon' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'status'        => new sfValidatorInteger(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tai_game[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaiGame';
  }

}
