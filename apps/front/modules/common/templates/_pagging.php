<?php
$params = array();
if(isset($vtParams)){
    foreach ($vtParams as $key => $value) {
        $params = array_merge(array($key => $value), $params);
    }
}
?>
<?php if ($pager->haveToPaginate()): ?>
    <div class="paging paging-right">
        <ul class="pages">
        <?php if ($pager->getPage() != $pager->getFirstPage()): ?>
            <li class="page page-1">
            <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => 1), $params)); ?>"><img src="/images/arrow.gif" title="First page" alt="<<" >&nbsp;</a>
            </li>
            <li class="page page-1">
            <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getPreviousPage()), $params)); ?>"><img src="/images/arrow3.gif" title="Previous page" alt="|<" >&nbsp;</a>
            </li>
        <?php endif; ?>
        <?php foreach ($pager->getLinks() as $page): ?>

            <?php if ($page == $pager->getPage()): ?>
                <li class="page page-1">
                <a href="#" class="active"><?php echo $page ?></a>
                </li>
            <?php else: ?>
                <li class="page page-1">
                <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => $page), $params)) ?>"><?php echo $page ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if ($pager->getPage() != $pager->getLastPage()) : ?>
            <li class="page page-1">
            <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getNextPage()), $params)); ?>"><img src="/images/arrow4.gif" title="Next page" alt=">>">&nbsp;</a>
            </li>
            <li class="page page-1">
            <a href="<?php echo url_for($redirectUrl, array_merge(array('page' => $pager->getLastPage()), $params)); ?>"><img src="/images/arrow2.gif" title="Last page" alt=">|" >&nbsp;</a>
            </li>
        <?php endif; ?>
        </ul>
    </div>
    <div class="clear"></div>
<?php endif; ?>
