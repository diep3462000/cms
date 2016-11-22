<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageChargAmountFormAdmin
 *
 * @author diepth2
 */
class gvManageXocDiaFormAdminFilter extends BaseMatchLogFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'roomid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'matchindex'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'gameid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_date' => new sfWidgetFormVnDatePicker(array(),array('readonly'=>false)),
        ));

        $this->setValidators(array(
            'roomid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'matchindex'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'gameid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'created_date' => new sfValidatorDateTime(array('required' => false)),
//            'createdtime' => new sfValidatorDateRange(array('required' => false,
//                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
//                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));
        $this->widgetSchema->setNameFormat('match_log_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select("g.name as game_name, " . $alias . ".*");
        $query->where($alias . ".gameId = ?", 15);
//        $query->where($alia s. ".money > 0");
//        $query->andWhere("status = 1");
        if (array_key_exists('created_date', $values)) {
            $createdTime = isset($filter["created_date"])? explode(" ", $filter["created_date"])[0]: date("Y-m-d", time());
            $query->andwhere($alias. '.createdtime >= ?',  $createdTime)
                  ->andwhere($alias . '.createdTime <= ?', $createdTime . "23:59:59");
        } else {
            $query->andwhere($alias. '.createdtime >= ?',  date('Y-m-d'));
//            $query->andwhere($alias.  '.createdtime <= ?', date('Y-m-d', time() . "23:59:59"));
        }
//        if(array_key_exists('partner_id', $values)&& $values['partner_id'] != ''){
//            $query->andWhere($alias .".providerId = ?",$values["partner_id"] );
//        }
//        if(array_key_exists('os_id', $values)&& $values['os_id'] != ''){
//            $query->andWhere("g.clientID = ?",$values["os_id"] );
//        }
        $query->leftJoin($alias. ".Game g");
//        $query->groupBy("DATE(". $alias .".created_at)");

        $query->orderBy($alias . ".createdtime desc");
        return $query;
    }

}
