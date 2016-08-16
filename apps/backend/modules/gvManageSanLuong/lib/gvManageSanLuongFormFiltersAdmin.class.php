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
class gvManageSanLuongFormFiltersAdmin extends BaseLogPaymentFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_cp = PartnerTable::getListPartnerForSelectBox();
        $arr_menhgia = array($i18n->__("Tất cá"), 10000, 20000, 50000, 100000, 200000, 500000);
        $arr_type =  ClientTypeTable::getListClientTypeForSelectBox();
        $arr_provider  = ProviderTable::getListProviderForSelectBox();
        $this->setWidgets(array(
            'partner_id' => new sfWidgetFormChoice(array('choices' => $arr_cp), array('add_empty' => true)),
            'os_id' => new sfWidgetFormChoice(array('choices' => $arr_type), array('add_empty' => true)),
            'menhgia' => new sfWidgetFormChoice(array('choices' => $arr_menhgia), array('add_empty' => true)),
            'provider_code' => new sfWidgetFormChoice(array('choices' => $arr_provider), array('add_empty' => true)),

            'created_at' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),


        ));

        $this->setValidators(array(
            'partner_id' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_cp))),
            'provider_code' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_provider))),
            'os_id' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_type))),
            'menhgia' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_menhgia))),
            'created_at' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));

        $this->widgetSchema->setNameFormat('gv_log_payment_filters[%s]');
        $this->widgetSchema['created_at']->setLabel($i18n->__("Thời gian giao dịch"));

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select("p.partnerName as parter_name, d.code as provider_code, count(". $alias . ".id) as card_amount, "
            . $alias . ".money as menhgia, g.cp");
        $query->where($alias. ".money > 0");
        $query->andWhere("status = 1");
        if (array_key_exists('created_at', $values)) {
            $text = trim($values['created_at']['text']);
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
                $query->andWhere($alias. '.created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('partner_id', $values)&& $values['partner_id'] != ''){
            $query->andWhere($alias .".providerId = ?",$values["partner_id"] );
        }
        if(array_key_exists('os_id', $values)&& $values['os_id'] != ''){
            $query->andWhere("g.clientID = ?",$values["os_id"] );
        }
        if(array_key_exists('menhgia', $values)&& $values['menhgia'] != 0){
            $query->andWhere($alias .".money = ?",$values["menhgia"] );
        }
        if(array_key_exists('provider_code', $values)&& $values['provider_code'] != ''){
            $query->andWhere($alias .".providerId = ?",$values["provider_code"] );
        }
        $query->leftJoin($alias. ".UserInfo g");
        $query->leftJoin("g.Partner p");
        $query->leftJoin($alias . ".Provider d");
        $query->groupBy("d.code, ". $alias . ".money");
        $query->orderBy($alias . ".providerId desc");
        return $query;
    }

}
