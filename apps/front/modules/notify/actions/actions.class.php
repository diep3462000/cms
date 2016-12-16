<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class notifyActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(1);
    }
    public function executeEvent(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(2);
    }
    public function executePolicy(sfWebRequest $request)
    {
    }
}