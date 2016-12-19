<?php

require_once dirname(__FILE__).'/../lib/gvManagerRevenueGameGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gvManagerRevenueGameGeneratorHelper.class.php';

/**
 * gvManagerRevenueGame actions.
 *
 * @package    Vt_Portals
 * @subpackage gvManagerRevenueGame
 * @author     diepth2
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gvManagerRevenueGameActions extends autoGvManagerRevenueGameActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->revenuGoldToday = MoneyLogTable::getTotalRevenuByDay(null, null, TypeGame::GOLD_MODE,  null, date('Y-m-d'));
        $this->revenuCashToday = MoneyLogTable::getTotalRevenuByDay(null, null, TypeGame::CASH_MODE,  null, date('Y-m-d'));
        
//        var_dump($this->revenuCashToday);die;

    //    $this->revenuGoldYesterday = MoneyLogTable::getTotalRevenuByDay(null, null, TypeGame::GOLD_MODE,  null, date('Y-m-d', time() - 24*3600));
      //  $this->revenuCashYesterday = MoneyLogTable::getTotalRevenuByDay(null, null, TypeGame::CASH_MODE,  null, date('Y-m-d', time() - 24*3600));

        $this->revenuGoldYesterday = TaxDailyStatictisTable::getTotalRevenuByDay(null, TypeGame::GOLD_MODE, date('Y-m-d', time() - 24*3600));
        $this->revenuCashYesterday = TaxDailyStatictisTable::getTotalRevenuByDay(null, TypeGame::CASH_MODE, date('Y-m-d', time() - 24*3600));

        $this->revenuGoldThisMonth = TaxDailyStatictisTable::getTotalRevenuByMonth(null, TypeGame::GOLD_MODE, null,  date('Y-m'));
        $this->revenuCashThisMonth = TaxDailyStatictisTable::getTotalRevenuByMonth(null, TypeGame::CASH_MODE, null, date('Y-m'));

        // Biểu đồ
        $this->revenuGoldByDate = TaxDailyStatictisTable::getMoneyGroupByDate($gameId = null, TypeGame::GOLD_MODE, $os_type = null);
        $this->revenuCashByDate = TaxDailyStatictisTable::getMoneyGroupByDate($gameId = null, TypeGame::CASH_MODE, $os_type = null);

        // Thống kê -----------------------------------------------------------------------------------------------------
        // Mảng DL từ bảng App join với bảng Platform
        // $this->listAppByPublisher = VtAppInfoTable::getListAppByPublisherActive();
        // Mảng DL từ bảng Request
        $daystr1 = mktime(0, 0, 0, date("m"), 1, date("Y"));
        $daystr2 = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        $datefrom = date("Y-m-d", $daystr1);
        $dateto = date("Y-m-d", $daystr2);
        $this->listRevenueGroupByDateFromTo = TaxDailyStatictisTable::getRevenueGroupByDateFromTo(null, $datefrom, $dateto, TypeGame::CASH_MODE, null);
        $this->listRevenueGoldGroupByDateFromTo = TaxDailyStatictisTable::getRevenueGroupByDateFromTo(null, $datefrom, $dateto, TypeGame::GOLD_MODE, null);
        // Mảng DL API từ bảng vt_api_item để hiển thị ở bảng
        $this->list_games = GameTable::getListGame();
        $this->list_os = ClientTypeTable::getListOs();
        $this->list_os = ClientTypeTable::getListOs();
        $this->list_partners = PartnerTable::getListPartner();

        // --------------------------------------------------------------------------------------------------------------
    }

    public function executeFilter(sfWebRequest $request)
    {
        $this->setPage(1);

        if ($request->hasParameter('_reset'))
        {
            $this->setFilters($this->configuration->getFilterDefaults());

            $this->redirect('@revenue_game');
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

            $this->redirect('@revenue_game');
        }
        $this->sidebar_status = $this->configuration->getListSidebarStatus();
        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        $this->setTemplate('index');
    }
}
