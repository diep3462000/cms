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
            'userId'       => new sfWidgetFormFilterInput(),
            'userName'     => new sfWidgetFormFilterInput(),
            'loggedInTime' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
            'deviceId'     => new sfWidgetFormFilterInput(),
            'deviceInfo'   => new sfWidgetFormFilterInput(),
            'remoteIp'     => new sfWidgetFormFilterInput(),
            'clientType'   => new sfWidgetFormFilterInput(),
            'packageName'  => new sfWidgetFormFilterInput(),
            'versionCode'  => new sfWidgetFormFilterInput(),
            'versionBuild' => new sfWidgetFormFilterInput(),
            'ipLocked'     => new sfWidgetFormFilterInput(),
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
        $query->orderBy($alias . ".loggedInTime desc");
        return $query;
    }

}
