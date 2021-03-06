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
class gvManageMoHistoryFormFiltersAdmin extends BaseMoHistoryFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();

        $this->setWidgets(array(
            'mo_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'phone_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'user_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'amount'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'transdate'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'shortcode'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'keyword'      => new sfWidgetFormFilterInput(),
            'content'      => new sfWidgetFormFilterInput(),
            'telco'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status'       => new sfWidgetFormFilterInput(),
            'created_date' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
        ));

        $this->setValidators(array(
            'mo_id'        => new sfValidatorPass(array('required' => false)),
            'phone_number' => new sfValidatorPass(array('required' => false)),
            'user_id'      => new sfValidatorPass(array('required' => false)),
            'amount'       => new sfValidatorPass(array('required' => false)),
            'transdate'    => new sfValidatorPass(array('required' => false)),
            'shortcode'    => new sfValidatorPass(array('required' => false)),
            'keyword'      => new sfValidatorPass(array('required' => false)),
            'content'      => new sfValidatorPass(array('required' => false)),
            'telco'        => new sfValidatorPass(array('required' => false)),
            'status'       => new sfValidatorPass(array('required' => false)),
            'created_date' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('sms_revenue_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);


        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
//        $query->select("DATE(". $alias .".created_at) as created_date," . "sum(". $alias . ".amount) as sum_money, "
//            . $alias . ".keyword as keyword". $alias . ".telco as telco");
        $query->andwhere($alias. ".amount > 0");
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
                $query->andWhere($alias. '.created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }

        $query->orderBy($alias . ".created_at desc");
        return $query;
    }

}
