<?php
require('config.php');
require('services.php');

$service = new CDV_Service($config);

$balance = $service->queryBalance();
echo '<meta charset="utf-8" />';
echo 'Ket qua query balance:<br/>';
echo "<pre>";
print_r($balance);
echo "</pre>";
die;
?>