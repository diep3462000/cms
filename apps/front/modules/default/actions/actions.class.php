<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chuyennv2
 * Date: 14/9/13
 * Time: 13:30 AM
 * To change this template use File | Settings | File Templates.
 */
class defaultActions extends sfActions
{
  public function executeError404(sfWebRequest $request)
  {
      //$this->mdl = $request->getParameter('module');
      $this->mdl = 'page404';
      $this->getResponse()->setTitle(sfContext::getInstance()->getI18N()->__('Bigken | 404'));
//      $this->redirect('@homepage');
      /*if(!sfContext::getInstance()->getUser()->isLogin()){
          $this->redirect('@homepage');
      }*/
  }

    public function executeLanguage(sfWebRequest $request)
    {
        $lang = $request->getParameter('lang', 'en');
        $arrLang = array('en', 'vi');
        if (!in_array($lang, $arrLang))
            $lang = 'en';

        $this->getUser()->setAttribute('wap_lang', $lang);
        $this->getUser()->setCulture($lang);
        //    $parseUrl = parse_url($referer);
        //    $url = (!isset($parseUrl['query']) || empty($parseUrl['query'])) ?
        //            $referer : $referer;
        $referrer = $request->getReferer() ? $request->getReferer() : "@homepage";
        $this->redirect($referrer);
        //$this->redirect('@homepage');
    }
}
