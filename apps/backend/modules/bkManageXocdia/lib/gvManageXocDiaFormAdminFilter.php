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
            'matchIndex'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'gameid'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_date' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),

        ));

        $this->setValidators(array(
            'roomid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'matchIndex'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'gameid'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'description' => new sfValidatorPass(array('required' => false)),
//            'created_date' => new sfValidatorDateTime(array('required' => false)),
            'created_date' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            )
        );
        $this->widgetSchema->setNameFormat('match_log_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select($alias . ".*");
        $query->where($alias . ".gameId = ?", 15);
//        $query->where($alia s. ".money > 0");
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
                $query->andWhere($alias. '.createdtime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        if(array_key_exists('description', $values)&& $values['description']['text'] != ''){
            $query->andWhere($alias .".description like ? ", "%" . $values["description"]['text'] . "%" );
        }
        if(array_key_exists('roomid', $values) && is_integer($values["roomid"]["text"] )){
            $query->andWhere($alias . ".roomId = ?", $values["roomid"]["text"] );
        }
        if(array_key_exists('matchIndex', $values) && is_integer($values["matchIndex"]["text"] )){
            $query->andWhere($alias . ".matchIndex = ?", $values["matchIndex"]["text"] );
        }
//        $query->leftJoin($alias. ".Game g");
//        $query->groupBy("DATE(". $alias .".created_at)");

        $query->orderBy($alias . ".createdtime desc");
        return $query;
    }

}
