<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GameClient', 'doctrine');

/**
 * BaseGameClient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $clientid
 * @property string $clientname
 * 
 * @method integer    getClientid()   Returns the current record's "clientid" value
 * @method string     getClientname() Returns the current record's "clientname" value
 * @method GameClient setClientid()   Sets the current record's "clientid" value
 * @method GameClient setClientname() Sets the current record's "clientname" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGameClient extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('game_client');
        $this->hasColumn('clientid', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('clientname', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}