<?php

/**
 * Room form base class.
 *
 * @method Room getObject() Returns the current form's model object
 *
 * @package    Vt_Portals
 * @subpackage form
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'roomid'            => new sfWidgetFormInputHidden(),
      'gameId'            => new sfWidgetFormInputText(),
      'roomName'          => new sfWidgetFormInputText(),
      'vipRoom'           => new sfWidgetFormInputText(),
      'minCash'           => new sfWidgetFormInputText(),
      'minGold'           => new sfWidgetFormInputText(),
      'minLevel'          => new sfWidgetFormInputText(),
      'roomCapacity'      => new sfWidgetFormInputText(),
      'playerSize'        => new sfWidgetFormInputText(),
      'minBet'            => new sfWidgetFormInputText(),
      'tax'               => new sfWidgetFormInputText(),
      'maxRoomplay'       => new sfWidgetFormInputText(),
      'permanentRoomPlay' => new sfWidgetFormInputText(),
      'kickLimit'         => new sfWidgetFormInputText(),
      'startTime'         => new sfWidgetFormDateTime(),
      'endTime'           => new sfWidgetFormDateTime(),
      'status'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'roomid'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('roomid')), 'empty_value' => $this->getObject()->get('roomid'), 'required' => false)),
      'gameId'            => new sfValidatorInteger(array('required' => false)),
      'roomName'          => new sfValidatorString(array('max_length' => 20)),
      'vipRoom'           => new sfValidatorInteger(array('required' => false)),
      'minCash'           => new sfValidatorInteger(array('required' => false)),
      'minGold'           => new sfValidatorInteger(array('required' => false)),
      'minLevel'          => new sfValidatorInteger(array('required' => false)),
      'roomCapacity'      => new sfValidatorInteger(array('required' => false)),
      'playerSize'        => new sfValidatorInteger(),
      'minBet'            => new sfValidatorInteger(array('required' => false)),
      'tax'               => new sfValidatorInteger(array('required' => false)),
      'maxRoomplay'       => new sfValidatorInteger(array('required' => false)),
      'permanentRoomPlay' => new sfValidatorInteger(array('required' => false)),
      'kickLimit'         => new sfValidatorInteger(array('required' => false)),
      'startTime'         => new sfValidatorDateTime(array('required' => false)),
      'endTime'           => new sfValidatorDateTime(array('required' => false)),
      'status'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Room';
  }

}
