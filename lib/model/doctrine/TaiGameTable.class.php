<?php

/**
 * TaiGameTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TaiGameTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TaiGameTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TaiGame');
    }
    public static function getListTaiGame(){
        return TaiGameTable::getInstance()->createQuery('a')
            ->select("a.*")
            ->where("a.status = ?", 1)
            ->fetchArray();
    }
}