<?php foreach ($games as $game): ?>
    <div class="newsItem">
        <div class="newsThumb">
            <img src="#">
        </div>
        <div class="newsTitle"><a href="<?php echo url_for('/luat-choi-chi-tiet/'.$game['gameid']) ?>"><?php echo $game['name']; ?></a></div>
<!--        <div class="newsTime">--><?php //echo $game['updated_at'] != null ? $game['updated_at'] : $game['created_at'] ; ?><!--</div>-->
        <div class="newsContent"><?php echo substr($game['description'], 0, 50); ?></div>
    </div>
    <div class="clear"></div>
<?php endforeach; ?>

