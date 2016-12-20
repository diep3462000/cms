<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Notification', 'doctrine');

/**
 * BaseNotification
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $notificationId
 * @property string $title
 * @property string $message
 * @property interger $pushHour
 * @property integer $repeat_daily
 * @property integer $status
 * 
 * @method integer      getNotificationId() Returns the current record's "notificationId" value
 * @method string       getTitle()          Returns the current record's "title" value
 * @method string       getMessage()        Returns the current record's "message" value
 * @method interger     getPushHour()       Returns the current record's "pushHour" value
 * @method integer      getRepeatDaily()    Returns the current record's "repeat_daily" value
 * @method integer      getStatus()         Returns the current record's "status" value
 * @method Notification setNotificationId() Sets the current record's "notificationId" value
 * @method Notification setTitle()          Sets the current record's "title" value
 * @method Notification setMessage()        Sets the current record's "message" value
 * @method Notification setPushHour()       Sets the current record's "pushHour" value
 * @method Notification setRepeatDaily()    Sets the current record's "repeat_daily" value
 * @method Notification setStatus()         Sets the current record's "status" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNotification extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('notification');
        $this->hasColumn('notificationId', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('message', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('pushHour', 'interger', 2, array(
             'type' => 'interger',
             'notnull' => true,
             'comment' => 'Thời gian push',
             'length' => 2,
             ));
        $this->hasColumn('repeat_daily', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}