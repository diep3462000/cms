<?php foreach ($contents as $content):?>
    <div class="newsItem">
        <div class="newsThumb">
            <img src="<?php echo VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $content['image']) ?>">
        </div>
        <div class="newsTitle"><a href="<?php echo url_for('/tin-tuc-chi-tiet/'.$content['id']) ?>"><?php echo $content['title']; ?></a></div>
        <div class="newsTime"><?php echo $content['updated_at'] != null ? $content['updated_at'] : $content['created_at'] ; ?></div>
        <div class="newsContent"><?php echo $content['description']; ?></div>
    </div>
<?php endforeach; ?>
