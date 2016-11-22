<?php

/**
 * VtActionLogs form base class.
 *
 * @method VtActionLogs getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVtActionLogsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'ip'          => new sfWidgetFormInputText(),
      'action'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'actor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'model'       => new sfWidgetFormInputText(),
      'record_id'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'ip'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'action'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'actor_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'model'       => new sfValidatorString(array('max_length' => 50)),
      'record_id'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vt_action_logs[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VtActionLogs';
  }

}
