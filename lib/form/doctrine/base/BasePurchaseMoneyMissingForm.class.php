<?php

/**
 * PurchaseMoneyMissing form base class.
 *
 * @method PurchaseMoneyMissing getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePurchaseMoneyMissingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'missId'     => new sfWidgetFormInputHidden(),
      'userId'     => new sfWidgetFormInputText(),
      'userName'   => new sfWidgetFormInputText(),
      'provider'   => new sfWidgetFormInputText(),
      'cardSerial' => new sfWidgetFormInputText(),
      'cardPin'    => new sfWidgetFormInputText(),
      'cardValue'  => new sfWidgetFormInputText(),
      'toCash'     => new sfWidgetFormInputText(),
      'active'     => new sfWidgetFormInputText(),
      'admin_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'missId'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('missId')), 'empty_value' => $this->getObject()->get('missId'), 'required' => false)),
      'userId'     => new sfValidatorInteger(array('required' => false)),
      'userName'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'provider'   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'cardSerial' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cardPin'    => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cardValue'  => new sfValidatorInteger(array('required' => false)),
      'toCash'     => new sfValidatorInteger(array('required' => false)),
      'active'     => new sfValidatorInteger(array('required' => false)),
      'admin_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('purchase_money_missing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchaseMoneyMissing';
  }

}
