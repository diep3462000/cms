<?php

/**
 * Room filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gameId'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'roomName'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vipRoom'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minCash'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minGold'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minLevel'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'roomCapacity'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'playerSize'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minBet'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tax'               => new sfWidgetFormFilterInput(),
      'maxRoomplay'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'permanentRoomPlay' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kickLimit'         => new sfWidgetFormFilterInput(),
      'startTime'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'endTime'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'status'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'gameId'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'roomName'          => new sfValidatorPass(array('required' => false)),
      'vipRoom'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minCash'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minGold'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minLevel'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'roomCapacity'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'playerSize'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minBet'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tax'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maxRoomplay'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'permanentRoomPlay' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kickLimit'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'startTime'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'endTime'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Room';
  }

  public function getFields()
  {
    return array(
      'roomid'            => 'Number',
      'gameId'            => 'Number',
      'roomName'          => 'Text',
      'vipRoom'           => 'Number',
      'minCash'           => 'Number',
      'minGold'           => 'Number',
      'minLevel'          => 'Number',
      'roomCapacity'      => 'Number',
      'playerSize'        => 'Number',
      'minBet'            => 'Number',
      'tax'               => 'Number',
      'maxRoomplay'       => 'Number',
      'permanentRoomPlay' => 'Number',
      'kickLimit'         => 'Number',
      'startTime'         => 'Date',
      'endTime'           => 'Date',
      'status'            => 'Number',
    );
  }
}
