<div class="news">
    <div class="newsBar">
        <div class="title"><i class="fa fa-university" aria-hidden="true"></i> <?php echo $title; ?></div>
    </div>
    <div class="newsItemGhim">
<!--        <div class="newsThumb">-->
<!--            <img src="#">-->
<!--        </div>-->
        <div class="newsTitle"><a href="#"><?php echo $content->title; ?></a></div>
        <div class="newsTime"><?php echo $content->updated_at != null ? $content->updated_at : $content->created_at ; ?></div>
        <div class="newsContent"><?php echo $content->content; ?></div>
    </div>
</div>