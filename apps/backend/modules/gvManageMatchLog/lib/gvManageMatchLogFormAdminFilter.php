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
class gvManageMatchLogFormAdminFilter extends BaseMatchLogFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'roomid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'matchindex'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'gameid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'createdtime' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
        ));

        $this->setValidators(array(
            'roomid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'matchindex'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'gameid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'createdtime' => new sfValidatorDateRange(array('required' => true,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            ));
        $this->widgetSchema->setNameFormat('match_log_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select("g.name as game_name, " . $alias . ".*");
//        $query->where($alias. ".money > 0");
//        $query->andWhere("status = 1");
        if (array_key_exists('createdtime', $values)) {
            $text = trim($values['createdtime']['text']);
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
                $query->andWhere($alias. '.createdtime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('gameid', $values)&& $values['gameid'] != ''){
            $query->andWhere($alias .".gameid = ?",$values["gameid"] );
        }
        if(array_key_exists('matchindex', $values)&& $values['matchindex'] != ''){
            $query->andWhere("g.matchindex = ?",$values["matchindex"] );
        }
        $query->leftJoin($alias. ".Game g");
//        $query->groupBy("DATE(". $alias .".created_at)");

        $query->orderBy($alias . ".createdtime desc");
        return $query;
    }

}
