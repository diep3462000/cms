<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="row-fluid">
    <div class="span6">

      <div class="control-group">
              <?php if ($form->hasGlobalErrors()): ?>
              <?php echo $form->renderGlobalErrors() ?>
              <?php endif; ?>
      
              <form action="<?php echo url_for('purchase_money_log_collection', array('action' => 'filter')) ?>" method="post">
                  <div class="span12 column-container">
                      <?php echo $form->renderHiddenFields() ?>
                      <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
                      <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
                      <?php include_partial('bkManageMoneyLog/filters_field', array(
                      'name'       => $name,
                      'attributes' => $field->getConfig('attributes', array()),
                      'label'      => $field->getConfig('label'),
                      'help'       => $field->getConfig('help'),
                      'form'       => $form,
                      'field'      => $field,
                      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name, 'filter_text'
                      )) ?>
                      <?php endforeach; ?>
                      
                    <div class="span2" style="height:50px">
                      <input class="btn" type="submit" value="<?php echo __('Filter', array(), 'tmcTwitterBootstrapPlugin') ?>" />
                      <?php echo link_to('<i class="icon-remove icon-black"></i> '. __('Reset filter', array(), 'tmcTwitterBootstrapPlugin'), 'purchase_money_log_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn')) ?></li>
                    </div>
                      
                  </div> 

              </form>
          <script type="text/javascript">
              $('#gv_log_payment_filters_created_date').daterangepicker(
                  {
                      format: 'DD/MM/YYYY',
                      startDate: '<?php echo date('d/m/Y')?>',
                      endDate: '<?php echo date('d/m/Y')?>'
                  }
              );
          </script>
          <script type="text/javascript">
              $('#gv_log_payment_filters_register_at').daterangepicker(
                  {
                      format: 'DD/MM/YYYY',
                      startDate: '<?php echo date('d/m/Y')?>',
                      endDate: '<?php echo date('d/m/Y')?>'
                  }
              );
          </script>
      </div>
    </div>
</div>
