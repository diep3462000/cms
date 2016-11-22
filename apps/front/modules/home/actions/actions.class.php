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
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeGioiThieu(fWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeTinTuc(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeHoTro(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }
    public function executeDoiThuong(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }
}
