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
class gvManageGiftCodeFormFiltersAdmin extends BaseGiftCodeFormFilter
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'giftEventId' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GiftEvent'), 'add_empty' => true)),
            'userId'      => new sfWidgetFormFilterInput(),
            'userName'    => new sfWidgetFormFilterInput(),
            'cashValue'   => new sfWidgetFormFilterInput(),
            'goldValue'   => new sfWidgetFormFilterInput(),
            'code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'expiredTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
            'reuseable'   => new sfWidgetFormFilterInput(),
            'status'      => new sfWidgetFormFilterInput(),
            'ip'          => new sfWidgetFormFilterInput(),
            'description' => new sfWidgetFormFilterInput(),
            'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'giftEventId' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GiftEvent'), 'column' => 'giftEventId')),
            'userId'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'userName'    => new sfValidatorPass(array('required' => false)),
            'cashValue'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'goldValue'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'code'        => new sfValidatorPass(array('required' => false)),
            'expiredTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'reuseable'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'ip'          => new sfValidatorPass(array('required' => false)),
            'description' => new sfValidatorPass(array('required' => false)),
            'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('gift_code_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->orderBy($alias . ".created_at desc");
        return $query;
    }

}
