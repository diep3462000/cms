<?php

/**
 * PurchaseMoneyLog form base class.
 *
 * @method PurchaseMoneyLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePurchaseMoneyLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'purchaseLogId' => new sfWidgetFormInputHidden(),
      'userId'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserInfo'), 'add_empty' => true)),
      'userName'      => new sfWidgetFormInputText(),
      'cashValue'     => new sfWidgetFormInputText(),
      'currentCash'   => new sfWidgetFormInputText(),
      'purchasedTime' => new sfWidgetFormInputText(),
      'parValue'      => new sfWidgetFormInputText(),
      'type'          => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'purchaseLogId' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('purchaseLogId')), 'empty_value' => $this->getObject()->get('purchaseLogId'), 'required' => false)),
      'userId'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserInfo'), 'required' => false)),
      'userName'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cashValue'     => new sfValidatorInteger(array('required' => false)),
      'currentCash'   => new sfValidatorInteger(array('required' => false)),
      'purchasedTime' => new sfValidatorInteger(array('required' => false)),
      'parValue'      => new sfValidatorInteger(array('required' => false)),
      'type'          => new sfValidatorInteger(array('required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 256, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('purchase_money_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchaseMoneyLog';
  }

}
