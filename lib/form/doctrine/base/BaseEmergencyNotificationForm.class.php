<?php

/**
 * EmergencyNotification form base class.
 *
 * @method EmergencyNotification getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmergencyNotificationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'notificationId' => new sfWidgetFormInputHidden(),
      'content'        => new sfWidgetFormTextarea(),
      'createdTime'    => new sfWidgetFormDateTime(),
      'expriedTime'    => new sfWidgetFormDateTime(),
      'active'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'notificationId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('notificationId')), 'empty_value' => $this->getObject()->get('notificationId'), 'required' => false)),
      'content'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'createdTime'    => new sfValidatorDateTime(),
      'expriedTime'    => new sfValidatorDateTime(),
      'active'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('emergency_notification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmergencyNotification';
  }

}
