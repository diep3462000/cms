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
class gvManageLoggedInLogFormFiltersAdmin extends BaseLoggedInLogFormFilter
{
    public function configure()
    {
        $this->setWidgets(array(
            'userId'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'userName'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'loggedInTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'deviceId'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'deviceInfo'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'remoteIp'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'clientType'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'packageName'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'versionCode'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'versionBuild' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'ipLocked'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'userId'       => new sfValidatorPass(array('required' => false)),
            'userName'     => new sfValidatorPass(array('required' => false)),
            'loggedInTime' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
            'deviceId'     => new sfValidatorPass(array('required' => false)),
            'deviceInfo'   => new sfValidatorPass(array('required' => false)),
            'remoteIp'     => new sfValidatorPass(array('required' => false)),
            'clientType'   => new sfValidatorPass(array('required' => false)),
            'packageName'  => new sfValidatorPass(array('required' => false)),
            'versionCode'  => new sfValidatorPass(array('required' => false)),
            'versionBuild' => new sfValidatorPass(array('required' => false)),
            'ipLocked'     => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('logged_in_log_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();

    }

    public function doBuildQuery(array $values) {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $query->orderBy($alias . ".logId desc");
        return $query;
    }

}
