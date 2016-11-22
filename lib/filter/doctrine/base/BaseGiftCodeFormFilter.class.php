<?php

/**
 * GiftCode filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGiftCodeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'giftEventId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'add_empty' => true)),
      'userId'      => new sfWidgetFormFilterInput(),
      'userName'    => new sfWidgetFormFilterInput(),
      'cashValue'   => new sfWidgetFormFilterInput(),
      'goldValue'   => new sfWidgetFormFilterInput(),
      'code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expiredTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'reuseable'   => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(),
      'ip'          => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'giftEventId' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GiftEvent'), 'column' => 'giftEventId')),
      'userId'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'userName'    => new sfValidatorPass(array('required' => false)),
      'cashValue'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'goldValue'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code'        => new sfValidatorPass(array('required' => false)),
      'expiredTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'reuseable'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip'          => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('gift_code_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftCode';
  }

  public function getFields()
  {
    return array(
      'giftId'      => 'Number',
      'giftEventId' => 'ForeignKey',
      'userId'      => 'Number',
      'userName'    => 'Text',
      'cashValue'   => 'Number',
      'goldValue'   => 'Number',
      'code'        => 'Text',
      'expiredTime' => 'Date',
      'reuseable'   => 'Number',
      'status'      => 'Number',
      'ip'          => 'Text',
      'description' => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
