<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GiftEvent', 'doctrine');

/**
 * BaseGiftEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $giftEventId
 * @property string $eventName
 * @property integer $cashValue
 * @property integer $goldValue
 * @property timestamp $expiredTime
 * @property integer $reuseable
 * @property string $description
 * @property integer $status
 * @property Doctrine_Collection $GiftCodes
 * 
 * @method integer             getGiftEventId() Returns the current record's "giftEventId" value
 * @method string              getEventName()   Returns the current record's "eventName" value
 * @method integer             getCashValue()   Returns the current record's "cashValue" value
 * @method integer             getGoldValue()   Returns the current record's "goldValue" value
 * @method timestamp           getExpiredTime() Returns the current record's "expiredTime" value
 * @method integer             getReuseable()   Returns the current record's "reuseable" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method integer             getStatus()      Returns the current record's "status" value
 * @method Doctrine_Collection getGiftCodes()   Returns the current record's "GiftCodes" collection
 * @method GiftEvent           setGiftEventId() Sets the current record's "giftEventId" value
 * @method GiftEvent           setEventName()   Sets the current record's "eventName" value
 * @method GiftEvent           setCashValue()   Sets the current record's "cashValue" value
 * @method GiftEvent           setGoldValue()   Sets the current record's "goldValue" value
 * @method GiftEvent           setExpiredTime() Sets the current record's "expiredTime" value
 * @method GiftEvent           setReuseable()   Sets the current record's "reuseable" value
 * @method GiftEvent           setDescription() Sets the current record's "description" value
 * @method GiftEvent           setStatus()      Sets the current record's "status" value
 * @method GiftEvent           setGiftCodes()   Sets the current record's "GiftCodes" collection
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGiftEvent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('gift_event');
        $this->hasColumn('giftEventId', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('eventName', 'string', 250, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => '',
             'length' => 250,
             ));
        $this->hasColumn('cashValue', 'integer', 11, array(
             'type' => 'integer',
             'comment' => '',
             'length' => 11,
             ));
        $this->hasColumn('goldValue', 'integer', 11, array(
             'type' => 'integer',
             'comment' => '',
             'length' => 11,
             ));
        $this->hasColumn('expiredTime', 'timestamp', 20, array(
             'type' => 'timestamp',
             'comment' => 'Thời điểm hết hạn. Đổi tên từ expired',
             'length' => 20,
             ));
        $this->hasColumn('reuseable', 'integer', 2, array(
             'type' => 'integer',
             'comment' => '0: dem so lan; 1: ko dem so lan su dung-su dung nhieu lan 1 ma',
             'length' => 2,
             ));
        $this->hasColumn('description', 'string', 250, array(
             'type' => 'string',
             'comment' => '',
             'length' => 250,
             ));
        $this->hasColumn('status', 'integer', 2, array(
             'type' => 'integer',
             'comment' => '',
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('GiftCode as GiftCodes', array(
             'local' => 'giftEventId',
             'foreign' => 'giftEventId'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}