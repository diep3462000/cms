<?php

/**
 * UserInfo filter form base class.
 *
 * @package    Vt_Portals
 * @subpackage filter
 * @author     diepth2
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'status'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'               => new sfWidgetFormFilterInput(),
      'isonline'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clientid'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'add_empty' => true)),
      'ip'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'device'                 => new sfWidgetFormFilterInput(),
      'screen'                 => new sfWidgetFormFilterInput(),
      'currentgameid'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'experience'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalmatch'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'totalwin'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'playedgame'             => new sfWidgetFormFilterInput(),
      'startplayedtime'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cp'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'add_empty' => true)),
      'deviceidentify'         => new sfWidgetFormFilterInput(),
      'gold'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cash'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'level'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'medal'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trustedindex'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'avatarid'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'autoready'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'autodenyinvitation'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastlogintime'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'verified'               => new sfWidgetFormFilterInput(),
      'verifiedPhone'          => new sfWidgetFormFilterInput(),
      'verifiedEmail'          => new sfWidgetFormFilterInput(),
      'disableCashTransaction' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'status'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'               => new sfValidatorPass(array('required' => false)),
      'isonline'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clientid'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ClientType'), 'column' => 'clientId')),
      'ip'                     => new sfValidatorPass(array('required' => false)),
      'device'                 => new sfValidatorPass(array('required' => false)),
      'screen'                 => new sfValidatorPass(array('required' => false)),
      'currentgameid'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'experience'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalmatch'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalwin'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'playedgame'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'startplayedtime'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Partner'), 'column' => 'partnerid')),
      'deviceidentify'         => new sfValidatorPass(array('required' => false)),
      'gold'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cash'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'medal'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trustedindex'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avatarid'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'autoready'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'autodenyinvitation'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lastlogintime'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'verified'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'verifiedPhone'          => new sfValidatorPass(array('required' => false)),
      'verifiedEmail'          => new sfValidatorPass(array('required' => false)),
      'disableCashTransaction' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('user_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserInfo';
  }

  public function getFields()
  {
    return array(
      'userid'                 => 'Number',
      'status'                 => 'Number',
      'username'               => 'Text',
      'isonline'               => 'Number',
      'clientid'               => 'ForeignKey',
      'ip'                     => 'Text',
      'device'                 => 'Text',
      'screen'                 => 'Text',
      'currentgameid'          => 'Number',
      'experience'             => 'Number',
      'totalmatch'             => 'Number',
      'totalwin'               => 'Number',
      'playedgame'             => 'Number',
      'startplayedtime'        => 'Date',
      'cp'                     => 'ForeignKey',
      'deviceidentify'         => 'Text',
      'gold'                   => 'Number',
      'cash'                   => 'Number',
      'level'                  => 'Number',
      'medal'                  => 'Number',
      'trustedindex'           => 'Number',
      'avatarid'               => 'Number',
      'autoready'              => 'Number',
      'autodenyinvitation'     => 'Number',
      'lastlogintime'          => 'Date',
      'verified'               => 'Number',
      'verifiedPhone'          => 'Text',
      'verifiedEmail'          => 'Text',
      'disableCashTransaction' => 'Number',
    );
  }
}
