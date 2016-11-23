<div class="news">
 <div class="newsBar">
  <div class="title"><i class="fa fa-university" aria-hidden="true"></i> <?php echo $title; ?></div>
 </div>

 <?php include_partial('rules/list', array('games' => $pager->getResults())) ?>

 <?php if ($pager->haveToPaginate()): ?>
 <div class="text-center">
  <ul class="pagination pagination-md">
<!--   <li>   <a href="--><?php //echo url_for('rule_game') ?><!--?page=1">-->
<!--     <img src="/legacy/images/first.png" alt="First page" />-->
<!--    </a></li>-->
<!--   <li>   <a href="--><?php //echo url_for('rule_game') ?><!--?page=--><?php //echo $pager->getPreviousPage() ?><!--">-->
<!--     <img src="/legacy/images/previous.png" alt="Previous page" title="Previous page" />-->
<!--    </a></li>-->
      <?php foreach ($pager->getLinks() as $page): ?>
     <?php if ($page == $pager->getPage()): ?>
        <li class="active">
         <a href="<?php echo url_for('rule_game') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
        </li>
     <?php else: ?>
     <li>
        <a href="<?php echo url_for('rule_game') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
     </li>
     <?php endif; ?>
    <?php endforeach; ?>
<!--   <li>   <a href="--><?php //echo url_for('rule_game') ?><!--?page=--><?php //echo $pager->getNextPage() ?><!--">-->
<!--     <img src="/legacy/images/next.png" alt="Next page" title="Next page" />-->
<!--    </a></li>-->
<!--   <li>      <a href="--><?php //echo url_for('rule_game') ?><!--?page=--><?php //echo $pager->getLastPage() ?><!--">-->
<!--     <img src="/legacy/images/last.png" alt="Last page" title="Last page" />-->
<!--    </a></li>-->
  </ul>
 </div>
 <?php endif; ?>

</div>

