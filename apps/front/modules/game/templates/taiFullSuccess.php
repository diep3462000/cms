<div class="block">
    <title>Tải game Bigken mới nhất</title>
    <div class="alert alert-info"><strong>- <a href="">Hướng dẫn cài đặt file APK</a></strong></div>
</div>
<?php
if($platform == "iphone"){
    $link = $link_ios->getLinkTai();
} else {
    $link = '/wap/uploads/files/' . $link_android->getFileDown();
}
?>
<?php if (isset($link)){ ?>
    <script type="text/javascript">
        window.location = "<?php echo $link ?>";
    </script>
<?php }?>
