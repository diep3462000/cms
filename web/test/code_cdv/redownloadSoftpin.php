<?php
require('config.php');
require('services.php');

$service = new CDV_Service($config);
$request_id = 'gamevina_1473928433139';
$redownload = $service->reDownloadSoftpin($request_id);
echo '<meta charset="utf-8" />';
echo 'Ket qua reDowload Sofpin. Request_id: '.$request_id.'<br/>';
echo "<pre>";
print_r($redownload);
echo "</pre>";
$key = substr(md5($config['key_sofpin']), 0, 24);
$cleartext = mcrypt_decrypt("tripledes", $key, base64_decode($redownload->listCards), "ecb", "\0\0\0\0\0\0\0\0");
echo "Sofpin decrypt: ". $cleartext . "<br>";
die;
?>