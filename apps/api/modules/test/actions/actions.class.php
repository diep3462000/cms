<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 24/06/2016
 * Time: 2:29 CH
 */
class testActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $prefix = $request->getParameter("prefix", null);
        $num = $request->getParameter("num", null);
        $user_check = UserTable::getUserLikeName($prefix . "_");
        if($user_check){
            return new Response(BuyCardErrorCode::FAILURE, "User da ton tai. vui ling chon prefix khac");
        }
        for ($i = 1; $i <= $num; $i++) {
            $user = new User();
            $user->setUsername($prefix . "_" . $i);
            $user->setDisplayname($prefix);
            $user->setRegistedtime(date("Y-m-d H:i:s", time()));
            $user->save();
            $password = '12345678';
            $user->setPassword(md5($user->getUserid() . $password));
            $user->save();
            $user_info = new UserInfo();
            $user_info->setUserid($user->getUserid());
            $user_info->setUsername($prefix . "_" . $i);
            $user_info->setIp("127.0.0.1");
            $user_info->setGold(10000000);
            $user_info->setCash(11111111);
            $user_info->setCurrentgameid($i % 6);
            $user_info->setExperience($i);
            $user_info->setTotalmatch($i);
            $user_info->setTotalwin($i);
            $user_info->setAvatarid(10000);
            $user_info->setAutoready(1);
            $user_info->setLevel(1);
            $user_info->setMedal(1);
            $user_info->setAutodenyinvitation(1);
            $user_info->setDeviceidentify(00000000);
            $user_info->save();
        }
        return new Response(BuyCardErrorCode::SUCCESS, "thanh cong");
    }
}