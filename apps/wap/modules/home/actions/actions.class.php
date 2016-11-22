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
}