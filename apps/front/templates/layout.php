<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
include_once("analyticstracking.php");
?>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="http://bigken.net/wap/images/icon.png" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
<head>


  <!--CSS-->
  <link href="/wap/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="/wap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="/wap/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
  <link href="/wap/css/material-icon.css" rel="stylesheet" type="text/css"/>
  <link href="/wap/css/styles2.css" rel="stylesheet" type="text/css"/>
  <link href="/wap/css/responsivemenu.css" rel="stylesheet" type="text/css"/>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700,700italic,400italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
  <!--lightbox css-->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/4.0.1/ekko-lightbox.css' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="site">
  <?php include_partial('home/header'); ?>
  <?php echo $sf_content ?>
  <?php include_partial('home/footer'); ?>
</body>
</div>
</html>
