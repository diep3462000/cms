<?php

/**
 * ExchangeAssetRequest filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExchangeAssetRequestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'requestUserId'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'requestUserName'  => new sfWidgetFormFilterInput(),
      'assetId'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'securityKey'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalCash'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'      => new sfWidgetFormFilterInput(),
      'checkedTime'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'responseData'     => new sfWidgetFormFilterInput(),
      'request_topup_id' => new sfWidgetFormFilterInput(),
      'totalParValue'    => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'requestUserId'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'userid')),
      'requestUserName'  => new sfValidatorPass(array('required' => false)),
      'assetId'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'securityKey'      => new sfValidatorPass(array('required' => false)),
      'amount'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalCash'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'      => new sfValidatorPass(array('required' => false)),
      'checkedTime'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'responseData'     => new sfValidatorPass(array('required' => false)),
      'request_topup_id' => new sfValidatorPass(array('required' => false)),
      'totalParValue'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('exchange_asset_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExchangeAssetRequest';
  }

  public function getFields()
  {
    return array(
      'requestId'        => 'Number',
      'requestUserId'    => 'ForeignKey',
      'requestUserName'  => 'Text',
      'assetId'          => 'Number',
      'securityKey'      => 'Text',
      'amount'           => 'Number',
      'totalCash'        => 'Number',
      'status'           => 'Number',
      'description'      => 'Text',
      'checkedTime'      => 'Date',
      'responseData'     => 'Text',
      'request_topup_id' => 'Text',
      'totalParValue'    => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
