<?php if ($sf_user->hasFlash('success')): ?>
    <div class="alert alert-success fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('success'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('success', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="alert alert-warning fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('notice'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('notice', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="alert alert-error fade in" style="color: red">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('error'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('error', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('info')): ?>
    <div class="alert alert-info fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('info'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('info', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>


<?php if ($sf_user->hasFlash('login_noacc')): ?>
    <div class="alert alert-info fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('login_noacc'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('login_noacc', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('login_success')): ?>
    <div class="alert alert-info fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('login_success'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('login_success', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('login_error')): ?>
    <div class="alert alert-info fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('login_error'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('login_error', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>


<?php if ($sf_user->hasFlash('registration_error')): ?>
    <div class="alert alert-info fade in">
        <button class="close" data-dismiss="alert" type="button">×</button>
        <?php echo __($sf_user->getFlash('registration_error'), array(), 'messages') ?>
    </div>
    <?php $sf_user->setAttribute('registration_error', 'true', 'symfony/user/sfUser/flash/remove') ?>
<?php endif; ?>