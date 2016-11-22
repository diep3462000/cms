<?php
require('config.php');
require('services.php');

$service = new CDV_Service($config);
$request_id = 'partnerTest_PHP_1401246435657';
$check_order = $service->checkOrdersCVD($request_id);
echo '<meta charset="utf-8" />';
echo 'Ket qua check Orders CDV. Request_id: '.$request_id.'<br/>';
echo "<pre>";
print_r($check_order);
echo "</pre>";
die;
?>