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
class bkManageMoneyLogFormFiltersAdmin extends BasePurchaseMoneyLogFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_cp = PartnerTable::getListPartnerForSelectBox();
        $arr_os = ClientTypeTable::getListClientTypeForSelectBox();
        $arr_type = array("" => $i18n->__("Tất cả"), 1 => $i18n->__("Thẻ cào"), 2 => $i18n->__("SMS") );
        $this->setWidgets(array(
            'partner_id' => new sfWidgetFormChoice(array('choices' => $arr_cp), array('add_empty' => true)),
            'os_id' => new sfWidgetFormChoice(array('choices' => $arr_os), array('add_empty' => true)),
            'type' => new sfWidgetFormChoice(array('choices' => $arr_type), array('add_empty' => true)),
            'created_date' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'user_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'register_at' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'display_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),

        ));

        $this->setValidators(array(
            'partner_id' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_cp))),
            'os_id' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_os))),
            'type' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_type))),
            'user_name'      => new sfValidatorPass(array('required' => false)),
            'display_name'      => new sfValidatorPass(array('required' => false)),
            'created_date' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'register_at' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('gv_log_payment_filters[%s]');
        $this->widgetSchema['created_date']->setLabel($i18n->__("Thời gian nạp thẻ"));
        $this->widgetSchema['register_at']->setLabel($i18n->__("Thời gian bắt đầu chơi game"));

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select("DATE(". $alias .".purchasedTime) as created_date," . "p.partnerName as partner_name, g.cp, p.partnerName as partner_name,"
            . $alias . ".purchasedTime, u.displayName as display_name, " . $alias . ".*");
//        $query->where($alias. ".money > 0");
//        $query->andWhere("status = 1");
        if (array_key_exists('created_date', $values)) {
            $text = trim($values['created_date']['text']);
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
                $query->andWhere($alias. '.purchasedTime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if (array_key_exists('register_at', $values)) {
            $text = trim($values['register_at']['text']);
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
                $query->andWhere('g.startPlayedTime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('type', $values)&& $values['type'] != ''){
            $query->andWhere($alias . ".type = ?",$values["type"] );
        }
        if(array_key_exists('user_name', $values)&& $values['user_name']['text'] != ''){
           $query->andWhere('lower(userName) LIKE ?  OR userId = ? ', array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%', $values['user_name']['text']));
        }
        if(array_key_exists('display_name', $values)&& $values['display_name']['text'] != ''){
            $query->andWhere('lower(u.displayName) LIKE ?  ', '%' .VtHelper::translateQuery($values['display_name']['text']) .'%' );
        }
        if(array_key_exists('partner_id', $values)&& $values['partner_id'] != ''){
            $query->andWhere("g.cp = ?",$values["partner_id"] );
        }
        if(array_key_exists('os_id', $values)&& $values['os_id'] != ''){
            $query->andWhere("g.clientID = ?",$values["os_id"] );
        }
        $query->leftJoin($alias. ".UserInfo g");
        $query->leftJoin("g.User u");
        $query->leftJoin("g.Partner p");
//        $query->leftJoin($alias . ".Provider d");
//        $query->groupBy("DATE(". $alias .".purchasedTime) ," . $alias. " .type");
//        $query->groupBy($alias. ".type");
        $query->orderBy($alias . ".purchasedTime desc");
        return $query;
    }

}
