<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseVtpEmailFormFilter
 *
 * @author ngoctv1
 */
class gvManageUserFormFiltersAdmin extends BaseUserFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_top = array("" => $i18n->__("Mới nhất"), 1 => $i18n->__("Level"), 2 => $i18n->__("Đại gia Ken"), 3 => $i18n->__("Đại gia Xu"), 4 => $i18n->__("Số ván chơi"),
            5 => $i18n->__("Số ván thắng"), 6 => $i18n->__("Top nạp thẻ"));
        $this->setWidgets(array(
            'user_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'verified_phone'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cash'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'gold'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'device'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'lastLoginTime' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'top' => new sfWidgetFormChoice(array('choices' => $arr_top), array('add_empty' => true)),


        ));

        $this->setValidators(array(
            'user_name'  => new sfValidatorPass(array('required' => false)),
            'verified_phone'     => new sfValidatorPass(array('required' => false)),
            'cash'     => new sfValidatorPass(array('required' => false)),
            'gold'     => new sfValidatorPass(array('required' => false)),
            'device'      => new sfValidatorPass(array('required' => false)),
            'top'      => new sfValidatorPass(array('required' => false)),
            'top' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_top))),
            'lastLoginTime' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));

        $this->widgetSchema->setNameFormat('gv_user_filters[%s]');
        $this->widgetSchema['lastLoginTime']->setLabel($i18n->__("Lần cuối đăng nhập"));
        $this->widgetSchema['user_name']->setLabel($i18n->__("Tên/ Id"));
        $this->widgetSchema['device']->setLabel($i18n->__("Thông tin thiết bị"));

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
//        var_dump($values);die;
        if (array_key_exists('lastLoginTime', $values)) {
            $text = trim($values['lastLoginTime']['text']);
            $dateArr = explode('-', $text);
            if (count($dateArr) == 2) {
                $date1 = trim($dateArr[0]);
                $date1Arr = explode('/', $date1);
                $date1Str = '';
                if (count($date1Arr) == 3) {
                    $date1Str = $date1Arr[2] . '-' . $date1Arr[1] . '-' . $date1Arr[0] . ' 00:00:00';
                }
                $date2 = trim($dateArr[1]);
                $date2Arr = explode('/', $date2);
                $date2Str = '';
                if (count($date2Arr) == 3) {
                    $date2Str = $date2Arr[2] . '-' . $date2Arr[1] . '-' . $date2Arr[0] . ' 23:59:59';
                }
                $query->andWhere('g.lastLoginTime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('user_name', $values)&& isset($values['user_name']['text'])){
            $query->andWhere('lower(' . $alias . '.displayName) LIKE ?  OR ' . $alias . '.userId = ?  OR ' . $alias . '.userName LIKE  ?',
                array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%', $values['user_name']['text'],
                    '%' . VtHelper::translateQuery($values['user_name']['text']) . '%'));
        }
        if(array_key_exists('cash', $values)&& $values['cash']['text'] != ''){
            $query->andwhere("g.cash = ?", $values['cash']['text']);
        }
        if(array_key_exists('verified_phone', $values)&& $values['verified_phone']['text'] != ''){
            $phone =$values['verified_phone']['text'];
            if (substr($phone, 0, 1) == '0') { #0975292582
                $phone = substr($values['verified_phone']['text'], 1);
            }
            $query->andwhere("g.verifiedPhone like ?", "%".  $phone . "%");
        }

        if(array_key_exists('gold', $values)&& $values['gold']['text'] != ''){
            $query->andwhere("g.gold = ?", $values['gold']['text']);
        }
        if(array_key_exists('device', $values)&& $values['device']['text'] != ''){
            $query->andwhere("g.device like ?", "%" . $values['device']['text'] . "%");
        }
//        if(array_key_exists('top', $values)&& $values['top'] != ''){
////            $query->orderBy("g."  . $values['top'] . " desc");
//        }
        $query->select("g.trustedIndex as trusted_index, g.device as device, 
            g.totalMatch as total_match, g.totalWin as total_win, (g.totalMatch - g.totalWin) as total_lost, g.cash as cash, g.gold as gold, g.verifiedPhone as verified_phone,  ". $alias . ".*");
        $query->leftJoin($alias. ".UserInfo g");

        if(array_key_exists('top', $values) && $values['top'] != ''){
            $list_top = array(0 => "startPlayedTime", 1 => "level", 2 => "cash", 3 => "gold", 4 => "totalMatch", 5 => "totalWin", 6 => "");
//            $query->andwhere("1=1");
            $query->orderBy($list_top[$values['top']] . " desc");
            $query->limit(100);
        } else {
            $query->orderBy($alias . ".userId desc");
        }
       // $query->leftJoin($alias. ".LogPayment l");
       // $query->groupBy("l.money");

        return $query;
    }

}
