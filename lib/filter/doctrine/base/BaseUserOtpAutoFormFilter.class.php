<?php

/**
 * UserOtpAuto filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserOtpAutoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userId'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'verifyCode'  => new sfWidgetFormFilterInput(),
      'phoneNumber' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expiredTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'userId'      => new sfValidatorPass(array('required' => false)),
      'verifyCode'  => new sfValidatorPass(array('required' => false)),
      'phoneNumber' => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'expiredTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_otp_auto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserOtpAuto';
  }

  public function getFields()
  {
    return array(
      'otpId'       => 'Number',
      'userId'      => 'Text',
      'verifyCode'  => 'Text',
      'phoneNumber' => 'Text',
      'status'      => 'Number',
      'expiredTime' => 'Date',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
