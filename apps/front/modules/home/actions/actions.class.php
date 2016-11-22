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
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeEvent(sfWebRequest $request)
    {
        $this->title = 'Sự kiện';
        $this->event = EventTable::getNewestEvent(0);
    }
    public function executeGioiThieu(sfWebRequest $request)
    {
        $this->title = 'Giới thiệu';
        $this->content = WebContentTable::getAllContent(2);
    }
    public function executeTinTuc(sfWebRequest $request)
    {
        $this->title = 'Tin tức';
        $this->content = WebContentTable::getNewestContent(0, 0);
    }
    public function executeHoTro(sfWebRequest $request)
    {
        $this->title = 'Hỗ trợ';
        $this->content = WebContentTable::getAllContent(3);
    }
    public function executeDoiThuong(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }
}
