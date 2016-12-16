<?php

/**
 * Notification filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotificationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pushHour'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'repeat_daily'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'          => new sfValidatorPass(array('required' => false)),
      'message'        => new sfValidatorPass(array('required' => false)),
      'pushHour'       => new sfValidatorPass(array('required' => false)),
      'repeat_daily'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('notification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notification';
  }

  public function getFields()
  {
    return array(
      'notificationId' => 'Number',
      'title'          => 'Text',
      'message'        => 'Text',
      'pushHour'       => 'Text',
      'repeat_daily'   => 'Number',
      'status'         => 'Number',
    );
  }
}
