<?php

/**
 * BaseLuckyWheelChance
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $logId
 * @property bigint $userId
 * @property string $description
 * @property bigint $round1_item
 * @property bigint $round2_item
 * @property timestamp $time
 * 
 * @method integer          getLogId()       Returns the current record's "logId" value
 * @method bigint           getUserId()      Returns the current record's "userId" value
 * @method string           getDescription() Returns the current record's "description" value
 * @method bigint           getRound1Item()  Returns the current record's "round1_item" value
 * @method bigint           getRound2Item()  Returns the current record's "round2_item" value
 * @method timestamp        getTime()        Returns the current record's "time" value
 * @method LuckyWheelChance setLogId()       Sets the current record's "logId" value
 * @method LuckyWheelChance setUserId()      Sets the current record's "userId" value
 * @method LuckyWheelChance setDescription() Sets the current record's "description" value
 * @method LuckyWheelChance setRound1Item()  Sets the current record's "round1_item" value
 * @method LuckyWheelChance setRound2Item()  Sets the current record's "round2_item" value
 * @method LuckyWheelChance setTime()        Sets the current record's "time" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLuckyWheelChance extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lucky_wheel_chance');
        $this->hasColumn('logId', 'integer', 11, array(
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
        $this->hasColumn('description', 'string', 256, array(
             'type' => 'string',
             'comment' => '',
             'length' => 256,
             ));
        $this->hasColumn('round1_item', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => '',
             'length' => 15,
             ));
        $this->hasColumn('round2_item', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => '',
             'length' => 15,
             ));
        $this->hasColumn('time', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             'comment' => 'thời gian quay',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}