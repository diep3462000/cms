<?php

/**
 * LoggedInLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLoggedInLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userId'       => new sfWidgetFormFilterInput(),
      'userName'     => new sfWidgetFormFilterInput(),
      'loggedInTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deviceId'     => new sfWidgetFormFilterInput(),
      'deviceInfo'   => new sfWidgetFormFilterInput(),
      'remoteIp'     => new sfWidgetFormFilterInput(),
      'clientType'   => new sfWidgetFormFilterInput(),
      'packageName'  => new sfWidgetFormFilterInput(),
      'versionCode'  => new sfWidgetFormFilterInput(),
      'versionBuild' => new sfWidgetFormFilterInput(),
      'ipLocked'     => new sfWidgetFormFilterInput(),
      'reloggedIn'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'userId'       => new sfValidatorPass(array('required' => false)),
      'userName'     => new sfValidatorPass(array('required' => false)),
      'loggedInTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deviceId'     => new sfValidatorPass(array('required' => false)),
      'deviceInfo'   => new sfValidatorPass(array('required' => false)),
      'remoteIp'     => new sfValidatorPass(array('required' => false)),
      'clientType'   => new sfValidatorPass(array('required' => false)),
      'packageName'  => new sfValidatorPass(array('required' => false)),
      'versionCode'  => new sfValidatorPass(array('required' => false)),
      'versionBuild' => new sfValidatorPass(array('required' => false)),
      'ipLocked'     => new sfValidatorPass(array('required' => false)),
      'reloggedIn'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('logged_in_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LoggedInLog';
  }

  public function getFields()
  {
    return array(
      'logId'        => 'Number',
      'userId'       => 'Text',
      'userName'     => 'Text',
      'loggedInTime' => 'Date',
      'deviceId'     => 'Text',
      'deviceInfo'   => 'Text',
      'remoteIp'     => 'Text',
      'clientType'   => 'Text',
      'packageName'  => 'Text',
      'versionCode'  => 'Text',
      'versionBuild' => 'Text',
      'ipLocked'     => 'Text',
      'reloggedIn'   => 'Text',
    );
  }
}
