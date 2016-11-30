<?php foreach ($games as $game): ?>
    <div class="newsItem">
        <div class="newsThumb">
            <img src="<?php echo VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $game['image']) ?>">
        </div>
        <div class="newsTitle"><a href="<?php echo url_for('/tin-tuc/'.$game['slug']) ?>"><?php echo $game['title']; ?></a></div>
        <div class="newsTime"><?php echo $game['created_at'] ; ?></div>
        <div class="newsContent"><?php echo html_entity_decode($game['description']); ?></div>
    </div>
    <div class="clear"></div>
<?php endforeach; ?>

