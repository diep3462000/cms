<?php foreach ($contents as $content):?>
    <div class="newsItem">
        <div class="newsThumb">
            <img src="<?php echo VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $content['image']) ?>">
        </div>
        <div class="newsTitle"><a href="<?php echo url_for('/tin-tuc/'.$content['slug']) ?>"><?php echo $content['title']; ?></a></div>
        <div class="newsTime"><?php echo $content['created_at'] ; ?></div>
        <div class="newsContent"><?php echo html_entity_decode($content['description']); ?></div>
    </div>
<?php endforeach; ?>
