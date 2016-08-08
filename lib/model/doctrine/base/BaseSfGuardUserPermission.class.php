<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SfGuardUserPermission', 'doctrine');

/**
 * BaseSfGuardUserPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $permission_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property SfGuardPermission $SfGuardPermission
 * @property SfGuardUser $SfGuardUser
 * 
 * @method integer               getUserId()            Returns the current record's "user_id" value
 * @method integer               getPermissionId()      Returns the current record's "permission_id" value
 * @method timestamp             getCreatedAt()         Returns the current record's "created_at" value
 * @method timestamp             getUpdatedAt()         Returns the current record's "updated_at" value
 * @method SfGuardPermission     getSfGuardPermission() Returns the current record's "SfGuardPermission" value
 * @method SfGuardUser           getSfGuardUser()       Returns the current record's "SfGuardUser" value
 * @method SfGuardUserPermission setUserId()            Sets the current record's "user_id" value
 * @method SfGuardUserPermission setPermissionId()      Sets the current record's "permission_id" value
 * @method SfGuardUserPermission setCreatedAt()         Sets the current record's "created_at" value
 * @method SfGuardUserPermission setUpdatedAt()         Sets the current record's "updated_at" value
 * @method SfGuardUserPermission setSfGuardPermission() Sets the current record's "SfGuardPermission" value
 * @method SfGuardUserPermission setSfGuardUser()       Sets the current record's "SfGuardUser" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSfGuardUserPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_permission');
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('permission_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SfGuardPermission', array(
             'local' => 'permission_id',
             'foreign' => 'id'));

        $this->hasOne('SfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}