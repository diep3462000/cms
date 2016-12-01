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
        $response = $this->getResponse();

//        Lay list tin tuc moi nhat
        $this->news = WebContentTable::getNewestRecord(0);
        $this->totalNews = WebContentTable::getTotalRecord(0);
        $this->games = WebContentTable::getNewestRecord(4);
        $this->totalGames = WebContentTable::getTotalRecord(4);
        $this->notify = NotifyTable::getNewestNofify(0);

        $response->setTitle('BIGKEN Game bài đổi thưởng HẤP DẪN và UY TÍN');
        $response->addMeta('keywords','game bai doi thuong, game bai, bigken');
        $response->addMeta('description','Game bài đổi thưởng BIGKEN  là game mobile trực tuyến hấp dẫn và uy tín, chơi game đánh bài ảo đổi thưởng thật hay nhất tại Việt Nam.');
    }
    public function executeGioiThieu(sfWebRequest $request)
    {
        $response = $this->getResponse();
//        $this->title = 'Giới thiệu';
        $this->contents = WebContentTable::getAllContent(2);

        $response->setTitle($this->contents->title);
        $response->addMeta('keywords',$this->contents->keywords);
        $response->addMeta('description',$this->contents->description);
    }
    public function executeHoTro(sfWebRequest $request)
    {
        $response = $this->getResponse();
//        $this->title = 'Hỗ trợ';
        $this->contents = WebContentTable::getAllContent(3);
        $response->setTitle($this->contents->title);
        $response->addMeta('keywords',$this->contents->keywords);
        $response->addMeta('description',$this->contents->description);
    }
    public function executeDieuLe(sfWebRequest $request)
    {
        $response = $this->getResponse();
//        $this->title = 'Điều lệ';
        $this->contents = WebContentTable::getAllContent(5);
        $response->setTitle($this->contents->title);
        $response->addMeta('keywords',$this->contents->keywords);
        $response->addMeta('description',$this->contents->description);
    }
    public function executeDoiThuong(sfWebRequest $request)
    {
        $this->notify = NotifyTable::getNewestNofify(0);
    }

}
