<?php

/**
 * CardProvider filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCardProviderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'providerCode' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'providerName' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(),
      'active'       => new sfWidgetFormFilterInput(),
      'telcoPercent' => new sfWidgetFormFilterInput(),
      'valuePercent' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'providerCode' => new sfValidatorPass(array('required' => false)),
      'providerName' => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'active'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'telcoPercent' => new sfValidatorPass(array('required' => false)),
      'valuePercent' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('card_provider_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CardProvider';
  }

  public function getFields()
  {
    return array(
      'providerId'   => 'Number',
      'providerCode' => 'Text',
      'providerName' => 'Text',
      'description'  => 'Text',
      'active'       => 'Number',
      'telcoPercent' => 'Text',
      'valuePercent' => 'Text',
    );
  }
}
