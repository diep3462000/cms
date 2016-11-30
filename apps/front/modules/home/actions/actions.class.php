<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class homeActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
//        Lay list tin tuc moi nhat
        $this->news = WebContentTable::getNewestRecord(0);
        $this->totalNews = WebContentTable::getTotalRecord(0);
        $this->games = WebContentTable::getNewestRecord(4);
        $this->totalGames = WebContentTable::getTotalRecord(4);
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeGioiThieu(sfWebRequest $request)
    {
        $this->title = 'Giới thiệu';
        $this->contents = WebContentTable::getAllContent(2);
    }
    public function executeHoTro(sfWebRequest $request)
    {
        $this->title = 'Hỗ trợ';
        $this->contents = WebContentTable::getAllContent(3);
    }
    public function executeDieuLe(sfWebRequest $request)
    {
        $this->title = 'Điều lệ';
        $this->contents = WebContentTable::getAllContent(5);
    }
    public function executeDoiThuong(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }

}
