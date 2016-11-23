<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class newsActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->title = 'Tin tức';
//        $this->contents = WebContentTable::getAllRecord(0);
//        $this->category = $this->getRoute()->getObject();
        $this->pager = new sfDoctrinePager(
            'WebContent',
            sfConfig::get('app_wap_max_items_on_page')
        );
        $this->pager->setQuery(WebContentTable::getActiveWebContentQuery(0));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request)
    {
        $news_id = $request->getParameter("id", null);
        $this->news = Doctrine_Core::getTable('WebContent')->find($news_id);
    }


}
