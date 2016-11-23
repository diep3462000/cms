<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class gameActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $game_id = $request->getParameter("id", null);
        $this->game = GameTable::getListGame($game_id);
    }
    public function executeTai(sfWebRequest $request)
    {
        $this->platform  = VtHelper::getPlatform();
        $this->link_android = TaiGameTable::getLinkByOs(0);
        $this->link_ios = TaiGameTable::getLinkByOs(1);
        if($this->platform == "android"){
            if($this->link_android->getIsdirect() == 1){
                $link = $this->link_android->getLinkTai();
            } else {
                $link = $this->link_android->getFileDown();
            }

        }
    }
    public function executeTaiGame(sfWebRequest $request)
    {
        $this->platform  = VtHelper::getPlatform();
        $this->tai_game = TaiGameTable::getListTaiGame();
        $this->link_android = TaiGameTable::getLinkByOs(0);
        $this->link_ios = TaiGameTable::getLinkByOs(1);
    }
    public function executeDl(sfWebRequest $request)
    {
    }
}