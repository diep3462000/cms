<?php

class dmDateTimePickerPluginConfiguration extends sfPluginConfiguration
{
  
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect('dm.form_generator.widget_subclass', array($this, 'listenToFormGeneratorWidgetSubclassEvent'));

    $this->dispatcher->connect('dm.context.loaded', array($this, 'listenToContextLoadedEvent'));
    
    $this->dispatcher->connect('dm.form_generator.validator_class', array($this, 'listenToFormGeneratorValidatorSubclassEvent'));
  }

  public function listenToContextLoadedEvent(sfEvent $e)
  {
    
    if ($this->configuration instanceof dmAdminApplicationConfiguration)
    {
        $e->getSubject()->getResponse()
        ->addStylesheet('/dmDateTimePickerPlugin/css/datetimepicker.css');
        $e->getSubject()->getResponse()
        ->addStylesheet('lib.ui-datepicker');
        $e->getSubject()->getResponse()
        ->addStylesheet('lib.ui');
    }
    
  }
  
  public function listenToFormGeneratorWidgetSubclassEvent(sfEvent $e, $subclass)
  {
    if($this->isDateTimePickerColumn($e['column']))
    {
      $subclass = 'DateTimePicker';
    }

    return $subclass;
  }
  
  public function listenToFormGeneratorValidatorSubclassEvent(sfEvent $e, $subclass)
  {
    if($this->isDateTimePickerColumn($e['column']))
    {
      $subclass = 'sfValidatorDateTimePicker';
    }

    return $subclass;
  }

  protected function isDateTimePickerColumn(sfDoctrineColumn $column)
  {
    return false !== strpos(dmArray::get($column->getTable()->getColumnDefinition($column->getName()), 'extra', ''), 'datetimepicker');
  }

}