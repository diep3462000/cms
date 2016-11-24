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
class bkManageWebContentFormFiltersAdmin extends BaseWebContentFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_time = array( '' => $i18n->__("Tất Cả"),0 =>$i18n->__("Tin Tức"), 2 => $i18n->__("Giới Thiệu"), 3 => $i18n->__("Hỗ trợ"));

        $this->setWidgets(array(
            'type' => new sfWidgetFormChoice(array('choices' => $arr_time), array('add_empty' => true)),
            'content'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'title'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));



        $this->setValidators(array(
            'type' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_time))),
            'content'      => new sfValidatorString(array('required' => false)),
            'title'      => new sfValidatorString(array('required' => false)),
            ));


        $this->widgetSchema['type']->setLabel($i18n->__("Loại"));
        $this->widgetSchema['content']->setLabel($i18n->__("Nội dung"));
        $this->widgetSchema['title']->setLabel($i18n->__("Tiêu đề"));

        $this->widgetSchema->setNameFormat('web_content_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->select($alias . ".*");
        $query->where($alias . ".status = 1");
        if(array_key_exists('type', $values) && $values['type'] != ''){
            $query->andWhere($alias . ".type = ?",$values["type"] );
        }
        if(array_key_exists('title', $values) && $values['title']['text'] != ''){
            $query->andWhere($alias.'.title LIKE ?  ', '%' .VtHelper::translateQuery($values['title']['text']) .'%' );
        }
        if(array_key_exists('content', $values) && $values['content']['text'] != ''){
            $query->andWhere($alias. '.content LIKE ?  ', '%' .VtHelper::translateQuery($values['content']['text']) .'%' );
        }
        $query->orderBy($alias . ".created_at desc");
        return $query;
    }
}
