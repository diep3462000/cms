<?php

/**
 * ExchangeAssetRequest form base class.
 *
 * @method ExchangeAssetRequest getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExchangeAssetRequestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'requestId'        => new sfWidgetFormInputHidden(),
      'requestUserId'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'requestUserName'  => new sfWidgetFormInputText(),
      'assetId'          => new sfWidgetFormInputText(),
      'securityKey'      => new sfWidgetFormTextarea(),
      'amount'           => new sfWidgetFormInputText(),
      'totalCash'        => new sfWidgetFormInputText(),
      'status'           => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'checkedTime'      => new sfWidgetFormDateTime(),
      'responseData'     => new sfWidgetFormTextarea(),
      'request_topup_id' => new sfWidgetFormInputText(),
      'totalParValue'    => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'requestId'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('requestId')), 'empty_value' => $this->getObject()->get('requestId'), 'required' => false)),
      'requestUserId'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'requestUserName'  => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'assetId'          => new sfValidatorInteger(),
      'securityKey'      => new sfValidatorString(array('max_length' => 256)),
      'amount'           => new sfValidatorInteger(),
      'totalCash'        => new sfValidatorInteger(),
      'status'           => new sfValidatorInteger(),
      'description'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'checkedTime'      => new sfValidatorDateTime(array('required' => false)),
      'responseData'     => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'request_topup_id' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'totalParValue'    => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('exchange_asset_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExchangeAssetRequest';
  }

}
