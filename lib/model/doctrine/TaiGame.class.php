<?php

/**
 * TaiGame
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TaiGame extends BaseTaiGame
{
    public function getOSView()
    {
        return sfConfig::get('app_os_build')[$this->getOS()];
    }
    public function getStatusView()
    {
        return $this->getStatus() == 0? "Chưa kích hoạt" : "Kích hoạt";
    }
    public function getIsDirectView()
    {
        return sfConfig::get('app_download_type')[$this->getIsDirect()];
    }

}