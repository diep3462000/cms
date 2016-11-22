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
      'notificationid' => new sfWidgetFormInputHidden(),
      'title'          => new sfWidgetFormTextarea(),
      'message'        => new sfWidgetFormTextarea(),
      'pushtime'       => new sfWidgetFormDateTime(),
      'cp'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'notificationid' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('notificationid')), 'empty_value' => $this->getObject()->get('notificationid'), 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'message'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'pushtime'       => new sfValidatorDateTime(array('required' => false)),
      'cp'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
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
