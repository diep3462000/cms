<?php
require('config.php');
require('services.php');

$service = new CDV_Service($config);

$request_id = 'partnerTest_PHP_1401247293589';
$type = 2; // 1: Topup Airtime -- 2: Download softpin

//goi webservice check transactions
$balance = $service->checkTrans($request_id, $type);

echo '<meta charset="utf-8" />';
echo 'Ket qua check Transaction. Request id: '.$request_id.'<br/>';
echo "<pre>";
print_r($balance);
echo "</pre>";
die;
?>