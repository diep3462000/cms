<?php

/**
 * TaxDailyStatictis form base class.
 *
 * @method TaxDailyStatictis getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaxDailyStatictisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'taxId'        => new sfWidgetFormInputHidden(),
      'day'          => new sfWidgetFormInputText(),
      'gameId'       => new sfWidgetFormInputText(),
      'taxValue'     => new sfWidgetFormInputText(),
      'isCash'       => new sfWidgetFormInputText(),
      'insertedTime' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'taxId'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('taxId')), 'empty_value' => $this->getObject()->get('taxId'), 'required' => false)),
      'day'          => new sfValidatorPass(),
      'gameId'       => new sfValidatorInteger(),
      'taxValue'     => new sfValidatorInteger(),
      'isCash'       => new sfValidatorInteger(array('required' => false)),
      'insertedTime' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tax_daily_statictis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxDailyStatictis';
  }

}
