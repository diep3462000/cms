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
      'uuid'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logstamp'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'userid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'username'      => new sfWidgetFormFilterInput(),
      'transactionid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MoneyTransaction'), 'add_empty' => true)),
      'lastcash'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'changecash'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currentcash'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastgold'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'changegold'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currentgold'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'taxpercent'    => new sfWidgetFormFilterInput(),
      'taxvalue'      => new sfWidgetFormFilterInput(),
      'gameid'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => true)),
      'insertedtime'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp'            => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'uuid'          => new sfValidatorPass(array('required' => false)),
      'logstamp'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userid'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'userid')),
      'username'      => new sfValidatorPass(array('required' => false)),
      'transactionid' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MoneyTransaction'), 'column' => 'transactionid')),
      'lastcash'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'changecash'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentcash'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastgold'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'changegold'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'currentgold'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'taxpercent'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'taxvalue'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gameid'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Game'), 'column' => 'gameid')),
      'insertedtime'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
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
      'logid'         => 'Number',
      'uuid'          => 'Text',
      'logstamp'      => 'Number',
      'userid'        => 'ForeignKey',
      'username'      => 'Text',
      'transactionid' => 'ForeignKey',
      'lastcash'      => 'Number',
      'changecash'    => 'Number',
      'currentcash'   => 'Number',
      'lastgold'      => 'Number',
      'changegold'    => 'Number',
      'currentgold'   => 'Number',
      'taxpercent'    => 'Number',
      'taxvalue'      => 'Number',
      'gameid'        => 'ForeignKey',
      'insertedtime'  => 'Date',
      'cp'            => 'Text',
      'description'   => 'Text',
    );
  }
}
