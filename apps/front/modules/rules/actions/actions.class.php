<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class rulesActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->title = 'Luật chơi';
//        $this->rules = GameTable::getAllRecord();
//        $this->category = $this->getRoute()->getObject();
        $this->pager = new sfDoctrinePager(
            'Game',
            sfConfig::get('app_wap_max_items_on_page')
        );
        $this->pager->setQuery(GameTable::getActiveGameQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request)
    {
        $games_id = $request->getParameter("id", null);
        $this->games = Doctrine_Core::getTable('Game')->find($games_id);
    }


}
