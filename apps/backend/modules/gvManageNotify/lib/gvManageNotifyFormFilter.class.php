<?php
/**
 * Created by PhpStorm.
 * User: phamminhsoncnttmdck5
 * Date: 15-Aug-16
 * Time: 3:49 PM
 */
class gvManageNotifyFormFilter extends BaseNotifyFormFilter
{
    public function configure()
    {
        $this->setWidgets(array(
            'content'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
            'content'    => new sfValidatorPass(array('required' => false)),
            'status'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
            'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));

        $this->widgetSchema->setNameFormat('notify_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->orderBy($alias . ".status desc, created_at asc");
        return $query;
    }


}