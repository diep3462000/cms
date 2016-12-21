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

        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/tai/tai_' . date('d') . '.log'));
        $logger->log('[executeTai] check doi tac:'. "ip:" . VtHelper::getRealIpAddr());
        $log = new LogWeb();
        $log->setAgent($_SERVER['HTTP_USER_AGENT']);
        $log->setBrownser(VtHelper::get_browser_name());
        $log->setIp(VtHelper::getDeviceIp());
        $log->setPlatform($this->platform);
        $log->setRefer(isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : "");
        $log->save();
    }
    public function executeTai4(sfWebRequest $request)
    {
        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/tai4/tai_' . date('d') . '.log'));
        $refer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : "";
	$logger->log('[executeTai] check doi tac:'. "ip:" . VtHelper::getRealIpAddr() . $refer);
        $log = new LogWeb();
        $log->setAgent($_SERVER['HTTP_USER_AGENT']);
        $log->setBrownser(VtHelper::get_browser_name());
        $log->setIp(VtHelper::getDeviceIp());
        $log->setPlatform($this->platform);
        $log->setRefer($refer);
        $log->save();
    }
    public function executeTaiGame(sfWebRequest $request)
    {
        $this->platform  = VtHelper::getPlatform();
        $this->tai_game = TaiGameTable::getListTaiGame();
        $this->link_android = TaiGameTable::getLinkByOs(0);
        $this->link_ios = TaiGameTable::getLinkByOs(1);
    }
    public function executeTaiFull(sfWebRequest $request)
    {
        $this->platform  = VtHelper::getPlatform();
        $this->link_android = TaiGameTable::getLinkByOs(0);
        $this->link_ios = TaiGameTable::getLinkByOs(1);

        $logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/tai/tai_' . date('d') . '.log'));
        $logger->log('[executeTai] check doi tac:'. "ip:" . VtHelper::getRealIpAddr());
        $log = new LogWeb();
        $log->setAgent($_SERVER['HTTP_USER_AGENT']);
        $log->setBrownser(VtHelper::get_browser_name());
        $log->setIp(VtHelper::getDeviceIp());
        $log->setPlatform($this->platform);
        $log->setRefer(isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : "");
        $log->save();
    }
    public function executeDl(sfWebRequest $request)
    {
    }


}