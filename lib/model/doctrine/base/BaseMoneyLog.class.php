<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MoneyLog', 'doctrine');

/**
 * BaseMoneyLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $logId
 * @property string $uuId
 * @property integer $logstamp
 * @property integer $userid
 * @property string $userName
 * @property integer $transactionId
 * @property integer $lastCash
 * @property integer $changeCash
 * @property integer $currentCash
 * @property integer $lastGold
 * @property integer $changeGold
 * @property integer $currentGold
 * @property integer $taxPercent
 * @property integer $taxValue
 * @property integer $gameId
 * @property timestamp $insertedTime
 * @property string $cp
 * @property string $description
 * @property User $User
 * @property UserInfo $UserInfo
 * @property Game $Game
 * @property MoneyTransaction $MoneyTransaction
 * 
 * @method integer          getLogId()            Returns the current record's "logId" value
 * @method string           getUuId()             Returns the current record's "uuId" value
 * @method integer          getLogstamp()         Returns the current record's "logstamp" value
 * @method integer          getUserid()           Returns the current record's "userid" value
 * @method string           getUserName()         Returns the current record's "userName" value
 * @method integer          getTransactionId()    Returns the current record's "transactionId" value
 * @method integer          getLastCash()         Returns the current record's "lastCash" value
 * @method integer          getChangeCash()       Returns the current record's "changeCash" value
 * @method integer          getCurrentCash()      Returns the current record's "currentCash" value
 * @method integer          getLastGold()         Returns the current record's "lastGold" value
 * @method integer          getChangeGold()       Returns the current record's "changeGold" value
 * @method integer          getCurrentGold()      Returns the current record's "currentGold" value
 * @method integer          getTaxPercent()       Returns the current record's "taxPercent" value
 * @method integer          getTaxValue()         Returns the current record's "taxValue" value
 * @method integer          getGameId()           Returns the current record's "gameId" value
 * @method timestamp        getInsertedTime()     Returns the current record's "insertedTime" value
 * @method string           getCp()               Returns the current record's "cp" value
 * @method string           getDescription()      Returns the current record's "description" value
 * @method User             getUser()             Returns the current record's "User" value
 * @method UserInfo         getUserInfo()         Returns the current record's "UserInfo" value
 * @method Game             getGame()             Returns the current record's "Game" value
 * @method MoneyTransaction getMoneyTransaction() Returns the current record's "MoneyTransaction" value
 * @method MoneyLog         setLogId()            Sets the current record's "logId" value
 * @method MoneyLog         setUuId()             Sets the current record's "uuId" value
 * @method MoneyLog         setLogstamp()         Sets the current record's "logstamp" value
 * @method MoneyLog         setUserid()           Sets the current record's "userid" value
 * @method MoneyLog         setUserName()         Sets the current record's "userName" value
 * @method MoneyLog         setTransactionId()    Sets the current record's "transactionId" value
 * @method MoneyLog         setLastCash()         Sets the current record's "lastCash" value
 * @method MoneyLog         setChangeCash()       Sets the current record's "changeCash" value
 * @method MoneyLog         setCurrentCash()      Sets the current record's "currentCash" value
 * @method MoneyLog         setLastGold()         Sets the current record's "lastGold" value
 * @method MoneyLog         setChangeGold()       Sets the current record's "changeGold" value
 * @method MoneyLog         setCurrentGold()      Sets the current record's "currentGold" value
 * @method MoneyLog         setTaxPercent()       Sets the current record's "taxPercent" value
 * @method MoneyLog         setTaxValue()         Sets the current record's "taxValue" value
 * @method MoneyLog         setGameId()           Sets the current record's "gameId" value
 * @method MoneyLog         setInsertedTime()     Sets the current record's "insertedTime" value
 * @method MoneyLog         setCp()               Sets the current record's "cp" value
 * @method MoneyLog         setDescription()      Sets the current record's "description" value
 * @method MoneyLog         setUser()             Sets the current record's "User" value
 * @method MoneyLog         setUserInfo()         Sets the current record's "UserInfo" value
 * @method MoneyLog         setGame()             Sets the current record's "Game" value
 * @method MoneyLog         setMoneyTransaction() Sets the current record's "MoneyTransaction" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMoneyLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('money_log');
        $this->hasColumn('logId', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('uuId', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('logstamp', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('userid', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('userName', 'string', 75, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 75,
             ));
        $this->hasColumn('transactionId', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('lastCash', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('changeCash', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('currentCash', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('lastGold', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('changeGold', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('currentGold', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('taxPercent', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('taxValue', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('gameId', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('insertedTime', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('cp', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('description', 'string', 4000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'userId',
             'foreign' => 'userId'));

        $this->hasOne('UserInfo', array(
             'local' => 'userId',
             'foreign' => 'userId'));

        $this->hasOne('Game', array(
             'local' => 'gameId',
             'foreign' => 'gameId'));

        $this->hasOne('MoneyTransaction', array(
             'local' => 'transactionId',
             'foreign' => 'transactionId'));
    }
}