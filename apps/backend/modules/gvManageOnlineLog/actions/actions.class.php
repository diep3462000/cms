<?php

require_once dirname(__FILE__).'/../lib/gvManageOnlineLogGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gvManageOnlineLogGeneratorHelper.class.php';

/**
 * gvManageOnlineLog actions.
 *
 * @package    Vt_Portals
 * @subpackage gvManageOnlineLog
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gvManageOnlineLogActions extends autoGvManageOnlineLogActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $filter = $this->getFilters();
        $insertedtime = isset($filter["insertedtime"])? explode(" ", $filter["insertedtime"])[0]: date("Y-m-d", time());
        $option = isset($filter["option"])?$filter["option"] : 6;
        $online_logs = OnlineLogTable::getOnlineLog($insertedtime, $option);
        $arr_log = array();
        foreach($online_logs as $i => $log){
            $arr_data =  (array)  json_decode($log["peakdata"]);
            $sum  = array_sum($arr_data);
            $arr_log[$log["insertedtime"]] = array(json_decode($log["peakdata"])->total, $sum - $arr_data["total"] - array_values($arr_data)[0]);

        }
//        var_dump($online_logs);die;
        $current_time_log = json_decode($online_logs[0]["peakdata"]);
        $list_game  = GameTable::getListGame();
        $arr_game = array();
        $arr_game["Người chơi"] = $current_time_log->total;
        $num_player = 0 ;
        foreach($list_game as $i => $game){
            //$arr_game[$game["id"]] = $game["name"];
            if(isset($current_time_log->$game["gameid"])){
                $arr_game[$game["name"]] =  $current_time_log->$game["gameid"];
                $num_player += $arr_game[$game["name"]];
            }
        }
        $arr_game["Người chơi"] = $num_player . "/" . $current_time_log->total;
        $this->arr_game=$arr_game;
        $this->arr_log = $arr_log;
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
    }
    protected function getPager()
    {
        $query = $this->buildQuery();
//        $pages = ceil($query->count() / $this->getMaxPerPage());
//        $pager = $this->configuration->getPager('OnlineLog');
//        $pager->setQuery($query);
//        $pager->setPage(($this->getPage() > $pages) ? $pages : $this->getPage());
//        $pager->init();

//        return $pager;
    }
    public function executeFilter(sfWebRequest $request)
    {
        $this->setPage(1);

        if ($request->hasParameter('_reset'))
        {
            $this->setFilters($this->configuration->getFilterDefaults());

            $this->redirect('@online_log');
        }

        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        //Chuyennv2 trim du lieu
        $filterValues = $request->getParameter($this->filters->getName());
        foreach ($filterValues as $key => $value)
        {
            if (isset($filterValues[$key]['text']))
            {
                $filterValues[$key]['text'] = trim($filterValues[$key]['text']);
            }
        }

        $this->filters->bind($filterValues);
        if ($this->filters->isValid())
        {
            $this->setFilters($this->filters->getValues());

            $this->redirect('@online_log');
        }
//        $this->sidebar_status = $this->configuration->getListSidebarStatus();
//        $this->pager = $this->getPager();
//        $this->sort = $this->getSort();

        $this->setTemplate('index');
    }
}
