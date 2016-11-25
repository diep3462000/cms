<div class="news_main">
    <div class="news_title"><h1><?php echo $games->name; ?></h1></div>
    <div class="news_content"><?php echo VtHelper::cleanXSS($games->description); ?></div>
</div>
