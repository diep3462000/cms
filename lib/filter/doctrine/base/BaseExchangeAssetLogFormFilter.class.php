<?php

/**
 * ExchangeAssetLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExchangeAssetLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'requestUserId'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'requestUserName'  => new sfWidgetFormFilterInput(),
      'assetId'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'securityKey'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalCash'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'requestTime'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'responseTime'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'description'      => new sfWidgetFormFilterInput(),
      'accepted'         => new sfWidgetFormFilterInput(),
      'request_topup_id' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'requestUserId'    => new sfValidatorPass(array('required' => false)),
      'requestUserName'  => new sfValidatorPass(array('required' => false)),
      'assetId'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'securityKey'      => new sfValidatorPass(array('required' => false)),
      'amount'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalCash'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requestTime'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'responseTime'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'description'      => new sfValidatorPass(array('required' => false)),
      'accepted'         => new sfValidatorPass(array('required' => false)),
      'request_topup_id' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('exchange_asset_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExchangeAssetLog';
  }

  public function getFields()
  {
    return array(
      'requestId'        => 'Number',
      'requestUserId'    => 'Text',
      'requestUserName'  => 'Text',
      'assetId'          => 'Number',
      'securityKey'      => 'Text',
      'amount'           => 'Number',
      'totalCash'        => 'Number',
      'requestTime'      => 'Date',
      'responseTime'     => 'Date',
      'description'      => 'Text',
      'accepted'         => 'Text',
      'request_topup_id' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
