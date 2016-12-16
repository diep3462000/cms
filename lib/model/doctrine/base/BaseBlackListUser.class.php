<?php

/**
 * BaseBlackListUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $blackListId
 * @property bigint $userId
 * @property bigint $userLockId
 * @property timestamp $lockTime
 * @property int $ipLocked
 * @property string $reason
 * 
 * @method integer       getBlackListId() Returns the current record's "blackListId" value
 * @method bigint        getUserId()      Returns the current record's "userId" value
 * @method bigint        getUserLockId()  Returns the current record's "userLockId" value
 * @method timestamp     getLockTime()    Returns the current record's "lockTime" value
 * @method int           getIpLocked()    Returns the current record's "ipLocked" value
 * @method string        getReason()      Returns the current record's "reason" value
 * @method BlackListUser setBlackListId() Sets the current record's "blackListId" value
 * @method BlackListUser setUserId()      Sets the current record's "userId" value
 * @method BlackListUser setUserLockId()  Sets the current record's "userLockId" value
 * @method BlackListUser setLockTime()    Sets the current record's "lockTime" value
 * @method BlackListUser setIpLocked()    Sets the current record's "ipLocked" value
 * @method BlackListUser setReason()      Sets the current record's "reason" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBlackListUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('black_list_user');
        $this->hasColumn('blackListId', 'integer', 11, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 11,
             ));
        $this->hasColumn('userId', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => '',
             'length' => 15,
             ));
        $this->hasColumn('userLockId', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => 'admin khoa',
             'length' => 15,
             ));
        $this->hasColumn('lockTime', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             'comment' => 'thời gian khóa',
             ));
        $this->hasColumn('ipLocked', 'int', 2, array(
             'type' => 'int',
             'comment' => '',
             'length' => 2,
             ));
        $this->hasColumn('reason', 'string', 20, array(
             'type' => 'string',
             'comment' => '',
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}