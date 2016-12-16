<?php

/**
 * Notification form base class.
 *
 * @method Notification getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotificationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'notificationId' => new sfWidgetFormInputHidden(),
      'title'          => new sfWidgetFormTextarea(),
      'message'        => new sfWidgetFormTextarea(),
      'pushHour'       => new sfWidgetFormInputText(),
      'repeat_daily'   => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'notificationId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('notificationId')), 'empty_value' => $this->getObject()->get('notificationId'), 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 500)),
      'message'        => new sfValidatorString(array('max_length' => 500)),
      'pushHour'       => new sfValidatorPass(),
      'repeat_daily'   => new sfValidatorInteger(array('required' => false)),
      'status'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notification';
  }

}
