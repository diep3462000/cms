<?php use_helper('I18N') ?>

<?php include_partial('tmcTwitterBootstrap/assets') ?>
<?php include_component('tmcTwitterBootstrap', 'header') ?>

<div id="login" class="container">
  <div class="hero-unit">
    <div class="pull-left login-left">
      <?php include_partial('logo') ?>
    </div>
    <div class="pull-left login-right">
      <h2><?php echo __('Quản Trị BIGKEN', null, 'tmcTwitterBootstrapPlugin') ?></span></h2>

      <p class="error_list"><?php echo __('Bạn không có quyền truy cập chức năng này!', null, 'tmcTwitterBootstrapPlugin') ?></p>

      <?php if (sfConfig::get('app_sfGuardPlugin_secure_links', true)): ?>
        <div id="links">
          <?php if (!include_slot('secure_links')): ?>
            <ul>
              <?php echo link_to(__('Trang Quản Trị', null, 'sfGuardPlugin'), '@homepage') ?></br>
              <?php echo link_to(__('Thoát', null, 'sfGuardPlugin'), '@sf_guard_signout') ?>
            </ul>
          <?php endif ?>
          <div class="clear"></div>
        </div>
      <?php endif ?>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
