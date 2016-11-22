<?php

/**
 * CardProvider form base class.
 *
 * @method CardProvider getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCardProviderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'providerId'   => new sfWidgetFormInputHidden(),
      'providerCode' => new sfWidgetFormInputText(),
      'providerName' => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'active'       => new sfWidgetFormInputText(),
      'telcoPercent' => new sfWidgetFormInputText(),
      'valuePercent' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'providerId'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('providerId')), 'empty_value' => $this->getObject()->get('providerId'), 'required' => false)),
      'providerCode' => new sfValidatorString(array('max_length' => 10)),
      'providerName' => new sfValidatorPass(),
      'description'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'active'       => new sfValidatorInteger(array('required' => false)),
      'telcoPercent' => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'valuePercent' => new sfValidatorString(array('max_length' => 5, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('card_provider[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CardProvider';
  }

}
