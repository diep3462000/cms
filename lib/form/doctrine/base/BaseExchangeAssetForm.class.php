<?php

/**
 * ExchangeAsset form base class.
 *
 * @method ExchangeAsset getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExchangeAssetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assetId'      => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'parValue'     => new sfWidgetFormInputText(),
      'cashValue'    => new sfWidgetFormInputText(),
      'trustedIndex' => new sfWidgetFormTextarea(),
      'provider'     => new sfWidgetFormInputText(),
      'type'         => new sfWidgetFormInputText(),
      'active'       => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'assetId'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('assetId')), 'empty_value' => $this->getObject()->get('assetId'), 'required' => false)),
      'name'         => new sfValidatorPass(),
      'parValue'     => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cashValue'    => new sfValidatorInteger(),
      'trustedIndex' => new sfValidatorString(array('max_length' => 256)),
      'provider'     => new sfValidatorString(array('max_length' => 12)),
      'type'         => new sfValidatorInteger(),
      'active'       => new sfValidatorInteger(),
      'description'  => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('exchange_asset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExchangeAsset';
  }

}
