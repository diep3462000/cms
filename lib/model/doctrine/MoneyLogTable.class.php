<?php

/**
 * MoneyLogTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MoneyLogTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MoneyLogTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MoneyLog');
    }

    public static function getTotalRevenuByDay($user_name = null, $gameId = null, $type_game = null, $os_type = null, $date)
    {
        $sql =  MoneyLogTable::getInstance()->createQuery('a')
            ->select('SUM(a.taxValue) AS sumTaxValue');
        $sql->where('DATE(a.insertedTime)= ?', $date);
        if($type_game == TypeGame::GOLD_MODE){
            $sql->andwhere('a.changeGold > 0');
        }
        else {
            $sql->andwhere('a.changeCash > 0');
        }
        if($os_type){
            $sql->leftJoin("a.UserInfo u");
            $sql->andwhere('u.os_type = ?', $os_type);
        }
        if($user_name){
            $sql->andwhere('b.userName= ?', $user_name);
        }
        if($gameId){
            $sql->andwhere('g.gameId = ?', $gameId);
        }
        return $sql->fetchArray();
    }
    /**
     * 10/08/2016 - diepth2: doanh thu thang
     * @param
     * @param string $type_game : gold, cash
     * @return mixed
     * @modifier:
     */
    public static function getTotalRevenuByMonth( $gameId = null, $type_game = null, $os_type = null, $date)
    {
        $date1Arr = explode('-', $date);
        $sql = MoneyLogTable::getInstance()->createQuery('a')
            ->select('SUM(a.taxValue) AS sumTaxValue');
        $sql->where('MONTH(a.insertedTime)= ?', $date1Arr[0]);
        $sql->andwhere('YEAR(a.insertedTime)= ?', $date1Arr[1]);
        $sql = self::prepareQuery($sql, $gameId = null, $type_game = null, $os_type = null);
        return $sql->fetchArray();
    }


    /**
     * 10/08/2016 - diepth2: truy cấn dữ liệu vẽ biểu đồ
     * @param
     * @param string $type_game : gold, cash
     * @return mixed
     * @modifier:
     */
    public static function getMoneyGroupByDate($gameId = null, $type_game = null, $os_type = null)
    {
        $sql = MoneyLogTable::getInstance()->createQuery('a')
            ->select('SUM(a.taxValue) AS sumTaxValue, DATE(a.insertedTime)');
        $sql = self::prepareQuery($sql, $gameId = null, $type_game = null, $os_type = null);
        $sql->groupBy("DATE(a.insertedTime)");
        return $sql->fetchArray();
    }

    public static function prepareQuery($sql, $gameId = null, $type_game = null, $os_type = null){
        if($type_game == TypeGame::GOLD_MODE){
            $sql->andwhere('a.changeGold > 0');
        } else {
            $sql->andwhere('a.changeCash > 0');
        }
        if($os_type){
            $sql->leftJoin("a.UserInfo u");
            $sql->andwhere('u.os_type = ?', $os_type);
        }
        if($gameId){
            $sql->andwhere('g.gameId = ?', $gameId);
        }
        return $sql;
    }


    /**
     * @param $gameId
     * @param $datefrom
     * @param $dateto

     * @return mixed
     * @modifier: diepth2 Chỉnh sửa để có thểm lấy thông tin thu nhập để VẼ BIỂU ĐỒ của tất cả DEV
     */
    public static function getRevenueGroupByDateFromTo($gameId = null, $datefrom, $dateto, $type_game = null, $os_type = null, $partner_id = null)
    {
        $sql = MoneyLogTable::getInstance()->createQuery('a')
            ->select('SUM(a.taxValue) AS sumTaxValue, DATE(a.insertedTime), a.gameId');
        $sql->where('DATE(a.insertedTime ) >= ?', $datefrom);
        $sql->andWhere('DATE(a.insertedTime ) <= ?', $dateto);
//        $sql = self::prepareQuery($sql, null , $type_game , $os_type );
        if($type_game == TypeGame::GOLD_MODE){
            $sql->andwhere('a.changeGold > 0');
        } else {
            $sql->andwhere('a.changeCash > 0');
        }
        $sql->leftJoin("a.UserInfo u");
        if($os_type){
            $sql->andwhere('u.clientId = ?', $os_type);
        }
//        var_dump($partner_id);die;
        if($partner_id){
            $sql->andwhere('u.cp = ?', $partner_id);
        }
        $sql->groupBy(" a.gameId ,  DATE(a.insertedTime)");
        $sql->orderBy(" DATE(a.insertedTime ) DESC");
        return $sql->fetchArray();
    }

}