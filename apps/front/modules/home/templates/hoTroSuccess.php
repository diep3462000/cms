<?php if(isset($contents->id)): ?>
<div class="news_main">
    <div class="news_title"><h1><?php echo $contents->title; ?></h1></div>
    <div class="news_time"><?php echo $contents->created_at ; ?></div>
    <div class="news_sapo">
        <?php echo $contents->description; ?>        </div>
    <div class="news_content">
        <?php echo html_entity_decode($contents->content); ?>        </div>
</div>
<?php endif; ?>