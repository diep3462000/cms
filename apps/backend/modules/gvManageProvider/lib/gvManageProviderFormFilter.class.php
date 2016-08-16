<?php
/**
 * Created by PhpStorm.
 * User: phamminhsoncnttmdck5
 * Date: 15-Aug-16
 * Time: 5:54 PM
 */
class gvManageProviderFormFilter extends BaseProviderFormFilter
{

    public function configure()
    {
        $this->setWidgets(array(
            'code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'code'        => new sfValidatorPass(array('required' => false)),
            'description' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('provider_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}
