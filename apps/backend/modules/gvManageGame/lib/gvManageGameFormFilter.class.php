<?php
/**
 * Created by PhpStorm.
 * User: phamminhsoncnttmdck5
 * Date: 15-Aug-16
 * Time: 3:49 PM
 */
class gvManageGameFormFilter extends BaseGameFormFilter
{
    public function configure()
    {
        $this->setWidgets(array(
            'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'help'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'status'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'name'        => new sfValidatorPass(array('required' => false)),
            'description' => new sfValidatorPass(array('required' => false)),
            'help'        => new sfValidatorPass(array('required' => false)),
            'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
        ));

        $this->widgetSchema->setNameFormat('game_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
}