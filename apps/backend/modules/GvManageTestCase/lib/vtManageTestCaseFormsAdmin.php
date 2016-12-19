<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageTestCaseFormsAdmin
 *
 * @author diepth2
 */
class gvManageTestCaseFormsAdmin extends BaseGvTestCaseForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $request = sfContext::getInstance()->getRequest();
        $this->setWidgets(array(
            'id'          => new sfWidgetFormInputHidden(),
            'test_key'    => new sfWidgetFormInputText(),
            'value'       => new sfWidgetFormTextarea(),
            'game_id'     => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormTextarea(),
            'status'      => new sfWidgetFormInputCheckbox(),
        ));
        $this->setValidators(array(
            'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'test_key'    => new sfValidatorString(array('max_length' => 20)),
            'value'       => new sfValidatorString(),
            'game_id'     => new sfValidatorInteger(),
            'description' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'status'      => new sfValidatorBoolean(),
        ));

        $this->widgetSchema->setNameFormat('gv_test_case[%s]');
        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
        $this->setupInheritance();
    }
//    protected function doBind(array $values) {
//        $values["status"] = isset($values["status"])? 1 : 0;
//        parent::doBind($values);
//    }
}
