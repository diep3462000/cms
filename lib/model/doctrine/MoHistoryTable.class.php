<?php

/**
 * MoHistoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MoHistoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MoHistoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MoHistory');
    }

    public static function checkMoExited($mo_id)
    {
        return MoHistoryTable::getInstance()->createQuery('a')
            ->select('a.*')
            ->where('a.mo_id = ?', $mo_id)
            ->fetchOne();
    }
}