<?php

require_once dirname(__FILE__).'/../lib/gvManageExchangeRequestGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gvManageExchangeRequestGeneratorHelper.class.php';

/**
 * gvManageExchangeRequest actions.
 *
 * @package    Vt_Portals
 * @subpackage gvManageExchangeRequest
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gvManageExchangeRequestActions extends autoGvManageExchangeRequestActions
{
    public function executeIndex(sfWebRequest $request)
    {
        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }
        else
        {
            $this->setPage(1);
        }

        // max per page
        if ($request->getParameter('max_per_page'))
        {
            $this->setMaxPerPage($request->getParameter('max_per_page'));
        }

        $this->sidebar_status = $this->configuration->getListSidebarStatus();
        $this->pager = $this->getPager();

        //Start - thongnq1 - 03/05/2013 - fix loi xoa du lieu tren trang danh sach
        if ($request->getParameter('current_page'))
        {
            $current_page = $request->getParameter('current_page');
            $this->setPage($current_page);
            $this->pager = $this->getPager();
        }
        //end thongnq1

        $this->sort = $this->getSort();
        $day = 60*60*24; $day_7 = time() - 6*$day;
//        $purchase_moneys = PurchaseMoneyLogTable::getTotalRevenueByDate();
        $purchase_moneys = ExchangeAssetRequestTable::getTotalRevenueByDate();

        $purchase_arr = array();
        foreach ($purchase_moneys as $index => $purchase_money){
            $purchase_arr[$purchase_money["purchase_date"]] = $purchase_money["sum_money"];
        }
        $this->purchase_arr = $purchase_arr;
        $this->sum_ken_nap = ExchangeAssetRequestTable::getTotalRevenue();
        $this->sum_money = ExchangeAssetRequestTable::getTotalRevenue();
        $this->sum_xu_ken = UserInfoTable::getSumMoneyUser();
//        var_dump($this->sum_xu_ken);die;
    }
}
