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
class gvManageExchangeAssetRequestFormFiltersAdmin extends BaseExchangeAssetRequestFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_status = array("" => $i18n->__("Tất cả"), 0 => $i18n->__("Chưa xử lý"), 1 => $i18n->__("Thành công") ,2 => $i18n->__("Thất bại") );
        $this->setWidgets(array(
            'requestUserId'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'user_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'requestUserName'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'assetId'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'securityKey'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'amount'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status' => new sfWidgetFormChoice(array('choices' => $arr_status), array('add_empty' => true)),
            'request_topup_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_date' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'responseData'     => new sfWidgetFormFilterInput(array('with_empty' => false)),

        ));

        $this->setValidators(array(
            'requestUserId'    => new sfValidatorPass(array('required' => false)),
            'requestUserName'  => new sfValidatorPass(array('required' => false)),
            'user_name'  => new sfValidatorPass(array('required' => false)),
            'assetId'          => new sfValidatorPass(array('required' => false)),
            'securityKey'      => new sfValidatorPass(array('required' => false)),
            'amount'           => new sfValidatorPass(array('required' => false)),
            'status' => new sfValidatorChoice(array('required' => false, 'choices' => array("", 0, 1, 2))),
            'description'      => new sfValidatorPass(array('required' => false)),
            'request_topup_id' => new sfValidatorPass(array('required' => false)),
            'responseData'     => new sfValidatorPass(array('required' => false)),
            'created_date' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));

        $this->widgetSchema->setNameFormat('exchange_asset_request_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
//        $query = ExchangeAssetRequestTable::getInstance()->createQuery('a');
        $query->select("u.displayName as display_name, "  . $alias . ".*");
//        $query->where($alias. ".money > 0");
        $query->where("status = 1");
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
                $query->andWhere($alias . '.created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('status', $values)&& $values['status'] != ''){
            $query->andWhere( ".status = ?",$values["status"] );
        }
        if(array_key_exists('user_name', $values)&& $values['user_name'] != ''){
            $query->andWhere('lower(u.displayName) LIKE ?  OR u.userId = ?  OR u.userName LIKE  ?',
                array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%', $values['user_name']['text'],
                    '%' . VtHelper::translateQuery($values['user_name']['text']) . '%'));
        }
        if(array_key_exists('responseData', $values)&& $values['responseData'] != ''){
            $query->andWhere('lower('.$alias. '.responseData) LIKE  ?', VtHelper::translateQuery($values['responseData']['text']) . '%');
        }
        $query->leftJoin($alias . ".User u");
//        $query->leftJoin($alias . ".MoneyTransaction t");
        $query->orderBy($alias . ".created_at desc");
        return $query;
    }

}
