<?php

/**
 * MoHistory form base class.
 *
 * @method MoHistory getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMoHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'mo_id'        => new sfWidgetFormInputText(),
      'phone_number' => new sfWidgetFormInputText(),
      'user_id'      => new sfWidgetFormInputText(),
      'amount'       => new sfWidgetFormInputText(),
      'transdate'    => new sfWidgetFormTextarea(),
      'shortcode'    => new sfWidgetFormTextarea(),
      'keyword'      => new sfWidgetFormInputText(),
      'content'      => new sfWidgetFormTextarea(),
      'telco'        => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mo_id'        => new sfValidatorPass(),
      'phone_number' => new sfValidatorPass(),
      'user_id'      => new sfValidatorPass(),
      'amount'       => new sfValidatorPass(),
      'transdate'    => new sfValidatorString(array('max_length' => 256)),
      'shortcode'    => new sfValidatorString(array('max_length' => 256)),
      'keyword'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'content'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'telco'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'status'       => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mo_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoHistory';
  }

}
