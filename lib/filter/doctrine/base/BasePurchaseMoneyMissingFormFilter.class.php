<?php

/**
 * PurchaseMoneyMissing filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePurchaseMoneyMissingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'userId'     => new sfWidgetFormFilterInput(),
      'userName'   => new sfWidgetFormFilterInput(),
      'provider'   => new sfWidgetFormFilterInput(),
      'cardSerial' => new sfWidgetFormFilterInput(),
      'cardPin'    => new sfWidgetFormFilterInput(),
      'cardValue'  => new sfWidgetFormFilterInput(),
      'toCash'     => new sfWidgetFormFilterInput(),
      'active'     => new sfWidgetFormFilterInput(),
      'admin_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'userId'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userName'   => new sfValidatorPass(array('required' => false)),
      'provider'   => new sfValidatorPass(array('required' => false)),
      'cardSerial' => new sfValidatorPass(array('required' => false)),
      'cardPin'    => new sfValidatorPass(array('required' => false)),
      'cardValue'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'toCash'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'admin_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('purchase_money_missing_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PurchaseMoneyMissing';
  }

  public function getFields()
  {
    return array(
      'missId'     => 'Number',
      'userId'     => 'Number',
      'userName'   => 'Text',
      'provider'   => 'Text',
      'cardSerial' => 'Text',
      'cardPin'    => 'Text',
      'cardValue'  => 'Number',
      'toCash'     => 'Number',
      'active'     => 'Number',
      'admin_id'   => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
