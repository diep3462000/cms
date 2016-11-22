<div class="news">
    <div class="newsBar">
        <div class="title"><i class="fa fa-university" aria-hidden="true"></i> <?php echo $title; ?></div>
    </div>
    <?php  foreach($event as $k => $v): ?>
    <div class="newsItemGhim">
        <div class="<?php echo $v['eventid'] != null ?  "newsThumb" : ""?>">
            <img src="<?php echo $v['photo']; ?>">
        </div>
        <div class="newsTitle"><a href="#"><?php echo $v['name']; ?></a></div>
        <div class="newsTime"><?php echo $v['endtime'] != null ? $v['endtime'] : $v['starttime']; ?></div>
        <div class="newsContent"><?php echo $v['content']; ?></div>
    </div>
    <?php endforeach; ?>
</div>