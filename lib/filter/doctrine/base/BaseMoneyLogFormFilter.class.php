<?php

/**
 * MoneyLog filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMoneyLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uuId'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logstamp'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'userName'      => new sfWidgetFormFilterInput(),
      'transactionId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MoneyTransaction'), 'add_empty' => true)),
      'lastCash'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'changeCash'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currentCash'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastGold'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'changeGold'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currentGold'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'taxPercent'    => new sfWidgetFormFilterInput(),
      'taxValue'      => new sfWidgetFormFilterInput(),
      'gameId'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => true)),
      'insertedTime'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp'            => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'uuId'          => new sfValidatorPass(array('required' => false)),
      'logstamp'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userid'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'userid')),
      'userName'      => new sfValidatorPass(array('required' => false)),
      'transactionId' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MoneyTransaction'), 'column' => 'transactionid')),
      'lastCash'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'changeCash'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentCash'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastGold'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'changeGold'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentGold'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'taxPercent'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'taxValue'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gameId'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Game'), 'column' => 'gameid')),
      'insertedTime'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp'            => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('money_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MoneyLog';
  }

  public function getFields()
  {
    return array(
      'logId'         => 'Number',
      'uuId'          => 'Text',
      'logstamp'      => 'Number',
      'userid'        => 'ForeignKey',
      'userName'      => 'Text',
      'transactionId' => 'ForeignKey',
      'lastCash'      => 'Number',
      'changeCash'    => 'Number',
      'currentCash'   => 'Number',
      'lastGold'      => 'Number',
      'changeGold'    => 'Number',
      'currentGold'   => 'Number',
      'taxPercent'    => 'Number',
      'taxValue'      => 'Number',
      'gameId'        => 'ForeignKey',
      'insertedTime'  => 'Date',
      'cp'            => 'Text',
      'description'   => 'Text',
    );
  }
}
