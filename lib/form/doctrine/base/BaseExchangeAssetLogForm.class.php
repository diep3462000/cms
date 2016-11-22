<?php

/**
 * ExchangeAssetLog form base class.
 *
 * @method ExchangeAssetLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExchangeAssetLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'requestId'        => new sfWidgetFormInputHidden(),
      'requestUserId'    => new sfWidgetFormInputText(),
      'requestUserName'  => new sfWidgetFormInputText(),
      'assetId'          => new sfWidgetFormInputText(),
      'securityKey'      => new sfWidgetFormTextarea(),
      'amount'           => new sfWidgetFormInputText(),
      'totalCash'        => new sfWidgetFormInputText(),
      'requestTime'      => new sfWidgetFormDateTime(),
      'responseTime'     => new sfWidgetFormDateTime(),
      'description'      => new sfWidgetFormTextarea(),
      'accepted'         => new sfWidgetFormInputText(),
      'request_topup_id' => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'requestId'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('requestId')), 'empty_value' => $this->getObject()->get('requestId'), 'required' => false)),
      'requestUserId'    => new sfValidatorPass(),
      'requestUserName'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'assetId'          => new sfValidatorInteger(),
      'securityKey'      => new sfValidatorString(array('max_length' => 256)),
      'amount'           => new sfValidatorInteger(),
      'totalCash'        => new sfValidatorInteger(),
      'requestTime'      => new sfValidatorDateTime(),
      'responseTime'     => new sfValidatorDateTime(array('required' => false)),
      'description'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'accepted'         => new sfValidatorPass(array('required' => false)),
      'request_topup_id' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('exchange_asset_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExchangeAssetLog';
  }

}
