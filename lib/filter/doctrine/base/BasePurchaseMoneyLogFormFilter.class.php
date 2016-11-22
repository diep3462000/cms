<?php

/**
 * PurchaseMoneyLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePurchaseMoneyLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userId'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserInfo'), 'add_empty' => true)),
      'userName'      => new sfWidgetFormFilterInput(),
      'cashValue'     => new sfWidgetFormFilterInput(),
      'currentCash'   => new sfWidgetFormFilterInput(),
      'purchasedTime' => new sfWidgetFormFilterInput(),
      'parValue'      => new sfWidgetFormFilterInput(),
      'type'          => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'userId'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UserInfo'), 'column' => 'userid')),
      'userName'      => new sfValidatorPass(array('required' => false)),
      'cashValue'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentCash'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'purchasedTime' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parValue'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('purchase_money_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchaseMoneyLog';
  }

  public function getFields()
  {
    return array(
      'purchaseLogId' => 'Number',
      'userId'        => 'ForeignKey',
      'userName'      => 'Text',
      'cashValue'     => 'Number',
      'currentCash'   => 'Number',
      'purchasedTime' => 'Number',
      'parValue'      => 'Number',
      'type'          => 'Number',
      'description'   => 'Text',
    );
  }
}
