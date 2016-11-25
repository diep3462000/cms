<div class="block">
 <title>Tải game Bigken mới nhất</title>
 <div class="alert alert-info"><strong>- <a href="">Hướng dẫn cài đặt file APK</a></strong></div>

 <div class="list-group text-center"><a class="list-group-item" href="<?php echo '/wap/uploads/files/' . $link_android->getFileDown(); ?>" target="_blank"><img src="/wap/images/download-apk-version.png">
   <!--  </a> <a class="list-group-item" href="#">-->
   <!--<!--   <span style="color:#008080;">Hướng dẫn cài đặt game bằng file .apk không qua CH Play</span></a>-->
   <!--  <a class="list-group-item" href="--><?php //echo 123;?><!--" style="display:none;" target="_blank">-->
   <!--   <img src="#"></a>-->
   <a class="list-group-item" href="<?php echo $link_ios->getLinkTai()?>" target="_blank"> <img src="/wap/images/apple.jpg"></a>
   <a class="list-group-item" href="<?php echo $link_android->getLinkTai()?>" target="_blank"> <img src="/wap/images/android.png"></a></div>
</div>
<?php
   if($platform == "android"){
     if($link_android->getIsDirect() == 0){
       $link = $link_android->getLinkTai();
     } else {
       $link = '/wap/uploads/files/' . $link_android->getFileDown();
     }
   } else if($platform == "iphone") {
      if($link_ios->getIsDirect() == 0){
        $link = $link_ios->getLinkTai();
      } else {
        $link = '/wap/uploads/files/' . $link_ios->getFileDown();
      }
   }
?>
<?php if (isset($link)){ ?>
 <script type="text/javascript">
  var count = 4;
  setInterval(function(){
   count--;
//   document.getElementById('countDown').innerHTML = count;
   if (count == 0) {
 //   window.location = "<?php echo $link ?>";
   }
  },1000);
 </script>
<?php }?>
