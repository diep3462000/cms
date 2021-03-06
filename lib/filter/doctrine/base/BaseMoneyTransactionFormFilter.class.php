<?php

/**
 * MoneyTransaction filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMoneyTransactionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'          => new sfWidgetFormFilterInput(),
      'code'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'type'          => new sfValidatorPass(array('required' => false)),
      'code'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('money_transaction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoneyTransaction';
  }

  public function getFields()
  {
    return array(
      'transactionid' => 'Number',
      'type'          => 'Text',
      'code'          => 'Text',
    );
  }
}
