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
class gvManageAddMoneyFormFiltersAdmin extends BaseAddMoneyFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'userId'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'addCash'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'addGold'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'admin_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'userId'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'addCash'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'addGold'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'description' => new sfValidatorPass(array('required' => true)),
            'admin_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
        ));

        $this->widgetSchema->setNameFormat('add_money_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
//        $query = ExchangeAssetRequestTable::getInstance()->createQuery('a');
        $query->select("s.username as admin_name, "  . $alias . ".*");
//        $query->where($alias. ".money > 0");
//        $query->andWhere("status = 1");
        if(array_key_exists('status', $values)&& $values['status'] != ''){
            $query->andWhere($alias . ".status = ?",$values["status"] );
        }
//        if(array_key_exists('user_name', $values)&& $values['user_name'] != ''){
//            $query->andWhere('lower(u.displayName) LIKE ?  OR u.userId = ?  OR u.userName LIKE  ?',
//                array('%' . VtHelper::translateQuery($values['user_name']['text']) . '%', $values['user_name']['text'],
//                    '%' . VtHelper::translateQuery($values['user_name']['text']) . '%'));
//        }
        $query->leftJoin($alias. ".sfGuardUser s");
        $query->orderBy($alias . ".created_at desc");
        return $query;
    }


}
