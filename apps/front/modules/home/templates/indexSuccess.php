
<!-- CONTAINER -->
<!--<div class="site">-->

<!-- --><?php //include_partial('home/header'); ?>

 <!-- ./INFO HEADER -->
 <!-- ./HEADER-->

 <!-- CONTENT -->
 <!-- EVENT BLOCK -->
 <div class="event">
  <a href="<?php echo url_for('tai_game')?>">
   <img src="/wap/images/banner-tai-game.png" style="width: 100%">
  </a>
 </div>
 <div id="fb-root"></div>

<!--</div>-->
<!-- ./CONTAINER -->
<!--Phan tin tuc moi-->
<?php if($totalNews > 0):?>
<div class="news">
 <div class="newsBar">
  <div class="title"><i class="fa fa-calendar" aria-hidden="true"></i> Tin tức</div>
 </div>
 <?php
 $item = sfConfig::get('app_wap_item_list_number') != null ? sfConfig::get('app_wap_item_list_number') : 4;
 include_partial('news/list', array('contents' => $news))
 ?>
 <?php if($totalNews > $item):?>
  <div class="text-center">
   <a href="<?php echo url_for('tin_tuc'); ?>" type="button" class="btn btn-default">Xem tất cả</a>
  </div>
 <?php endif; ?>

</div>
<?php endif; ?>

<?php if($totalGames > 0):?>
<!--Phan luat choi moi-->
<div class="news">
 <div class="newsBar">
  <div class="title"><i class="fa fa-calendar" aria-hidden="true"></i> Luật chơi</div>
 </div>

 <?php

 $item = sfConfig::get('app_wap_item_list_number') != null ? sfConfig::get('app_wap_item_list_number') : 4;
 include_partial('rules/list', array('games' => $games))
 ?>
 <?php if($totalGames > $item):?>
  <div class="text-center">
   <a href="<?php echo url_for('rule_game'); ?>" type="button" class="btn btn-default">Xem tất cả</a>
  </div>
 <?php endif; ?>
</div>
<?php endif; ?>