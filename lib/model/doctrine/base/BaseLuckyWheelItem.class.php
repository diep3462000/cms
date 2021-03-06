<?php

/**
 * BaseLuckyWheelItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $itemId
 * @property string $itemName
 * @property int $round
 * @property bigint $value
 * @property bigint $rare
 * @property string $description
 * @property bigint $emotionId
 * @property int $status
 * 
 * @method integer        getItemId()      Returns the current record's "itemId" value
 * @method string         getItemName()    Returns the current record's "itemName" value
 * @method int            getRound()       Returns the current record's "round" value
 * @method bigint         getValue()       Returns the current record's "value" value
 * @method bigint         getRare()        Returns the current record's "rare" value
 * @method string         getDescription() Returns the current record's "description" value
 * @method bigint         getEmotionId()   Returns the current record's "emotionId" value
 * @method int            getStatus()      Returns the current record's "status" value
 * @method LuckyWheelItem setItemId()      Sets the current record's "itemId" value
 * @method LuckyWheelItem setItemName()    Sets the current record's "itemName" value
 * @method LuckyWheelItem setRound()       Sets the current record's "round" value
 * @method LuckyWheelItem setValue()       Sets the current record's "value" value
 * @method LuckyWheelItem setRare()        Sets the current record's "rare" value
 * @method LuckyWheelItem setDescription() Sets the current record's "description" value
 * @method LuckyWheelItem setEmotionId()   Sets the current record's "emotionId" value
 * @method LuckyWheelItem setStatus()      Sets the current record's "status" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLuckyWheelItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lucky_wheel_item');
        $this->hasColumn('itemId', 'integer', 11, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 11,
             ));
        $this->hasColumn('itemName', 'string', 256, array(
             'type' => 'string',
             'comment' => 'Tên Item',
             'length' => 256,
             ));
        $this->hasColumn('round', 'int', 2, array(
             'type' => 'int',
             'comment' => '1: xu, 2: ken',
             'length' => 2,
             ));
        $this->hasColumn('value', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => 'giá trị thưởng',
             'length' => 15,
             ));
        $this->hasColumn('rare', 'bigint', 15, array(
             'type' => 'bigint',
             'comment' => '',
             'length' => 15,
             ));
        $this->hasColumn('description', 'string', 256, array(
             'type' => 'string',
             'comment' => '',
             'length' => 256,
             ));
        $this->hasColumn('emotionId', 'bigint', 15, array(
             'type' => 'bigint',
             'notnull' => true,
             'comment' => '',
             'length' => 15,
             ));
        $this->hasColumn('status', 'int', 2, array(
             'type' => 'int',
             'comment' => '1 active',
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}