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
    }
    public function executeTaiGame(sfWebRequest $request)
    {
        $this->platform  = VtHelper::getPlatform();
        $this->tai_game = TaiGameTable::getListTaiGame();
        var_dump($this->tai_game);die;
//        $link_android = $this->tai_game[];
    }
    public function executeDl(sfWebRequest $request)
    {
    }
}