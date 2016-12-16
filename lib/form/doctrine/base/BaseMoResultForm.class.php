<?php

/**
 * MoResult form base class.
 *
 * @method MoResult getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMoResultForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'mo_id'      => new sfWidgetFormInputText(),
      'amount'     => new sfWidgetFormInputText(),
      'userId'     => new sfWidgetFormInputText(),
      'userName'   => new sfWidgetFormInputText(),
      'mt_content' => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mo_id'      => new sfValidatorPass(),
      'amount'     => new sfValidatorPass(),
      'userId'     => new sfValidatorPass(),
      'userName'   => new sfValidatorString(array('max_length' => 32)),
      'mt_content' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mo_result[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoResult';
  }

}
