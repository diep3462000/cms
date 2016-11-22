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
class gvManagePurchaseMoneyMissingFormFiltersAdmin extends BasePurchaseMoneyMissingFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'userId'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'userName'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'provider'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cardSerial' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cardPin'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cardValue'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'toCash'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'active'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'userId'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'userName'   => new sfValidatorPass(array('required' => false)),
            'provider'   => new sfValidatorPass(array('required' => false)),
            'cardSerial' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'cardPin'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'cardValue'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'toCash'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'active'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('purchase_money_missing_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

//    public function doBuildQuery(array $values) {
//        $query = parent::doBuildQuery($values);
//        $alias = $query->getRootAlias();
////        $query = ExchangeAssetRequestTable::getInstance()->createQuery('a');
//        $query->select("u.displayName as display_name, "  . $alias . ".*");
////        $query->where($alias. ".money > 0");
////        $query->andWhere("status = 1");
//        if (array_key_exists('created_date', $values)) {
//            $text = trim($values['created_date']['text']);
//            $dateArr = explode('-', $text);
//            if (count($dateArr) == 2) {
//                $date1 = trim($dateArr[0]);
//                $date1Arr = explode('/', $date1);
//                $date1Str = '';
//                if (count($date1Arr) == 3) {
//                    $date1Str = $date1Arr[2] . '-' . $date1Arr[1] . '-' . $date1Arr[0] . ' 00:00:00';
//                }
//                $date2 = trim($dateArr[1]);
//                $date2Arr = explode('/', $date2);
//                $date2Str = '';
//                if (count($date2Arr) == 3) {
//                    $date2Str = $date2Arr[2] . '-' . $date2Arr[1] . '-' . $date2Arr[0] . ' 23:59:59';
//                }
//                $query->andWhere($alias . '.created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
//            }
//        }
//        if(array_key_exists('status', $values)&& $values['status'] != ''){
//            $query->andWhere($alias . ".status = ?",$values["status"] );
//        }
//        if(array_key_exists('user_name', $values)&& $values['user_name'] != ''){
//            $query->andWhere('lower(u.displayName) LIKE ?  OR u.userId = ?  OR u.userName LIKE  ?',
//                array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%', $values['user_name']['text'],
//                    '%' . VtHelper::translateQuery($values['user_name']['text']) . '%'));
//        }
//        $query->leftJoin($alias . ".User u");
////        $query->leftJoin($alias . ".MoneyTransaction t");
//        $query->orderBy($alias . ".created_at desc");
//        return $query;
//    }

}
