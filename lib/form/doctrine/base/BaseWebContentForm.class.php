<?php

/**
 * WebContent form base class.
 *
 * @method WebContent getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWebContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'image'       => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'title'       => new sfWidgetFormTextarea(),
      'status'      => new sfWidgetFormInputText(),
      'type'        => new sfWidgetFormInputText(),
      'is_hot'      => new sfWidgetFormInputText(),
      'keywords'    => new sfWidgetFormTextarea(),
      'description' => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 12)),
      'content'     => new sfValidatorString(array('max_length' => 8000, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'status'      => new sfValidatorInteger(),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'is_hot'      => new sfValidatorInteger(array('required' => false)),
      'keywords'    => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('web_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebContent';
  }

}
