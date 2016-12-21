<?php

/**
 * MoneyLog form base class.
 *
 * @method MoneyLog getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMoneyLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'logId'         => new sfWidgetFormInputHidden(),
      'uuId'          => new sfWidgetFormInputText(),
      'logstamp'      => new sfWidgetFormInputText(),
      'userid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'userName'      => new sfWidgetFormInputText(),
      'transactionId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MoneyTransaction'), 'add_empty' => false)),
      'lastCash'      => new sfWidgetFormInputText(),
      'changeCash'    => new sfWidgetFormInputText(),
      'currentCash'   => new sfWidgetFormInputText(),
      'lastGold'      => new sfWidgetFormInputText(),
      'changeGold'    => new sfWidgetFormInputText(),
      'currentGold'   => new sfWidgetFormInputText(),
      'taxPercent'    => new sfWidgetFormInputText(),
      'taxValue'      => new sfWidgetFormInputText(),
      'gameId'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => false)),
      'insertedTime'  => new sfWidgetFormDateTime(),
      'cp'            => new sfWidgetFormTextarea(),
      'description'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'logId'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('logId')), 'empty_value' => $this->getObject()->get('logId'), 'required' => false)),
      'uuId'          => new sfValidatorString(array('max_length' => 50)),
      'logstamp'      => new sfValidatorInteger(),
      'userid'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'userName'      => new sfValidatorString(array('max_length' => 75, 'required' => false)),
      'transactionId' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MoneyTransaction'), 'required' => false)),
      'lastCash'      => new sfValidatorInteger(),
      'changeCash'    => new sfValidatorInteger(),
      'currentCash'   => new sfValidatorInteger(),
      'lastGold'      => new sfValidatorInteger(),
      'changeGold'    => new sfValidatorInteger(),
      'currentGold'   => new sfValidatorInteger(),
      'taxPercent'    => new sfValidatorInteger(array('required' => false)),
      'taxValue'      => new sfValidatorInteger(array('required' => false)),
      'gameId'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'required' => false)),
      'insertedTime'  => new sfValidatorDateTime(array('required' => false)),
      'cp'            => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('money_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoneyLog';
  }

}
