<?php

/**
 * sfGuardUserPermissionTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserPermissionTable extends PluginsfGuardUserPermissionTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfGuardUserPermissionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUserPermission');
    }

    public static function deletePermissionByUser($userid)
    {
        $query=  sfGuardUserPermissionTable::getInstance()->createQuery()
            ->delete()
            ->where('user_id=?',$userid);
        return $query->execute();
    }

    public static function getPermissionByUser($userid)
    {
        $query=  sfGuardUserPermissionTable::getInstance()->createQuery()
            ->select('permission_id')
            ->where('user_id=?',$userid);
        return $query->execute();
    }

    public static function checkPermissionWhenDelete($perId){
        return sfGuardUserPermissionTable::getInstance()->createQuery()
            ->select('user_id, permission_id')
            ->where('permission_id=?',$perId)
            ->fetchArray();
    }
    //Lay danh sách user theo permission id
    public static function getUserByPermissionId($permissionId){
        return sfGuardUserPermissionTable::getInstance()->createQuery()
            ->select('user_id')
            ->where('permission_id=?',$permissionId)
            ->fetchArray();
    }


}