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
        $this->pager = new sfDoctrinePager(
            'WebContent',
            sfConfig::get('app_wap_max_items_on_page')
        );
        $this->pager->setQuery(WebContentTable::getActiveWebContentQuery(4));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request)
    {
        $slug = $request->getParameter("slug", null);
        $this->games = WebContentTable::getObjectBySlug($slug);
    }


}
