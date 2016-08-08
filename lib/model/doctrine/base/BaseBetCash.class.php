<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BetCash', 'doctrine');

/**
 * BaseBetCash
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $betcashid
 * @property integer $cash
 * 
 * @method integer getBetcashid() Returns the current record's "betcashid" value
 * @method integer getCash()      Returns the current record's "cash" value
 * @method BetCash setBetcashid() Sets the current record's "betcashid" value
 * @method BetCash setCash()      Sets the current record's "cash" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBetCash extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bet_cash');
        $this->hasColumn('betcashid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('cash', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}