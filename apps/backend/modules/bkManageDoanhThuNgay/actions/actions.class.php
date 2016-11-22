<?php

require_once dirname(__FILE__).'/../lib/bkManageDoanhThuNgayGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManageDoanhThuNgayGeneratorHelper.class.php';

/**
 * bkManageDoanhThuNgay actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManageDoanhThuNgay
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManageDoanhThuNgayActions extends autoBkManageDoanhThuNgayActions
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
        $filters = $this->getUser()->getAttribute('bkManageDoanhThuNgay.filters', array(), 'admin_module');

        if($filters){
            foreach ($filters as $key => $value)
            {
                if (isset($filters[$key]['text']))
                {
                    $filters[$key]['text'] = trim($filters[$key]['text']);
                }
            }
        }


        $this->total_by_type = PurchaseMoneyLogTable::getTotalRevenueByType($filters);

//        $day = 60*60*24; $day_7 = time() - 6*$day;
        $purchase_moneys = PurchaseMoneyLogTable::getTotalRevenueByDate($filters);

        $purchase_arr = array();
        foreach ($purchase_moneys as $index => $purchase_money){
            $purchase_arr[$purchase_money["purchase_date"]][$purchase_money["type"]] = array(isset($purchase_money["sum_money"]) ? $purchase_money["sum_money"] : 0, isset($purchase_money["sum_cash"]) ? $purchase_money["sum_cash"] : 0);
        }
        $this->purchase_arr = $purchase_arr;
    }
}
