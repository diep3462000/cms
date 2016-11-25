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
            'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'admin_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'userId'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'description' => new sfValidatorPass(array('required' => false)),
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
        $query->where("1=1");
        if(array_key_exists('userId', $values)&& $values['userId']['text'] != ''){
            $query->andWhere('userId =  ?',$values['userId']['text']);
        }
        if(array_key_exists('description', $values)&& $values['description'] ["text"] != ''){
            $query->andWhere('lower(description) like  ?', "%" . $values['description']["text"] . "%");
        }

        $query->leftJoin($alias. ".sfGuardUser s");
        $query->orderBy($alias . ".created_at desc");
        return $query;
    }


}
