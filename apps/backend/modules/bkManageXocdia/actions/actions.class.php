<?php

require_once dirname(__FILE__).'/../lib/bkManageXocdiaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bkManageXocdiaGeneratorHelper.class.php';

/**
 * bkManageXocdia actions.
 *
 * @package    Vt_Portals
 * @subpackage bkManageXocdia
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bkManageXocdiaActions extends autoBkManageXocdiaActions
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
        $filter = $this->getFilters();

        $createdTime = isset($filter["created_date"])? explode(" ", $filter["created_date"])[0]: date("Y-m-d", time());
//        var_dump($createdTime);die;

        $turn0 = MatchLogTable::getNumByResult($createdTime, 0);
    }

}
