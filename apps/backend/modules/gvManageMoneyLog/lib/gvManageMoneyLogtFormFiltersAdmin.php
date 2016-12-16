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
class gvManageMoneyLogtFormFiltersAdmin extends BaseMoneyLogFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_status = array("" => $i18n->__("Tất cả"), 1 => $i18n->__("Ken"), 2 => $i18n->__("Xu"));
        $this->setWidgets(array(
            'user_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'user_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'insertedTime' => new sfWidgetFormFilterInput(array('with_empty' => false), array('readonly' => true)),
            'type' => new sfWidgetFormChoice(array('choices' => $arr_status), array('add_empty' => true)),
            'gameId'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Game'), 'add_empty' => true)),


        ));

        $this->setValidators(array(
            'user_name'  => new sfValidatorPass(array('required' => false)),
            'user_id'  => new sfValidatorPass(array('required' => false)),
            'type' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_status))),
            'gameId'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Game'), 'column' => 'gameid')),
            'insertedTime' => new sfValidatorDateRange(array('required' => false,
                'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')),
                'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('money_log_filters[%s]');
        $this->widgetSchema['user_id']->setLabel($i18n->__("User id"));
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select("u.displayName as display_name,  t.type as transaction_view, "  . $alias . ".*");
//        $query->where($alias. ".money > 0");
//        $query->andWhere("status = 1");
        if (array_key_exists('insertedTime', $values)) {
            $text = trim($values['insertedTime']['text']);
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
                $query->andWhere($alias . '.insertedTime BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        $request = sfContext::getInstance()->getRequest();
        $userId = $request->getParameter('userId');
        $qr = false;

        if($userId){
            $query->where("u.userId = ?", $userId);
            $qr = true;
        }
        else if(array_key_exists('user_name', $values)&& $values['user_name']['text'] != ''){
                $query->andWhere('lower(u.displayName) LIKE ? OR u.userName LIKE  ?',
                    array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%',
                        '%' . VtHelper::translateQuery($values['user_name']['text']) . '%'));
            $qr = true;

        }
            if(array_key_exists('type', $values)&& $values['type'] != ''){
            if($values['type'] = 1) {
                $query->andWhere($alias . ".changeCash != 0");
            } else {
                $query->andWhere($alias . ".changeGold != 0" );
            }
        }
        if(array_key_exists('user_id', $values)&& $values['user_id']['text'] != ''){
            $query->andWhere("u.userId = ?", $values['user_id']['text']);
            $qr = true;
        }
        if($qr == false){
            $query->andWhere("1=2");
        }



                $query->leftJoin($alias . ".User u");
        $query->leftJoin($alias . ".MoneyTransaction t");
        $query->orderBy($alias . ".insertedTime desc");
        return $query;
    }

}
