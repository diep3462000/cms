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
class gvManageCardProviderFormFiltersAdmin extends BaseCardProviderFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_status = array("" => $i18n->__("Tất cả"), 1 => $i18n->__("Ken"), 2 => $i18n->__("Xu"));
        $this->setWidgets(array(
            'providerCode' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'providerName' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'active'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'telcoPercent' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'valuePercent' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'providerCode' => new sfValidatorPass(array('required' => false)),
            'providerName' => new sfValidatorPass(array('required' => false)),
            'description'  => new sfValidatorPass(array('required' => false)),
            'active'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'telcoPercent' => new sfValidatorPass(array('required' => false)),
            'valuePercent' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('card_provider_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }
}
