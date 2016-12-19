<div class="container">
    <div class="alert alert-info" style="text-align: center; overflow-x: scroll">
        <h2><?php echo __('Xin chào') ?>, <?php echo $sf_user->getGuardUser() ?>!</h2>
        <p><?php echo __('Bạn đã nhấn vào liên kết không tồn tại hoặc không đúng. Bạn vui lòng, nhấn')?> <a href="<?php echo url_for('@homepage')?>"><?php echo __('vào đây') ?></a> <?php echo __('để chọn các chức năng khác.') ?></p>
        <img src="/images/page-404.png">
    </div>
</div>