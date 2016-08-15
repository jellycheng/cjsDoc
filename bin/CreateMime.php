<?php
require dirname(__DIR__) . '/vendor/autoload.php';
$url = "http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types";
$getType = 1;
if($getType==1) {
  $mimeText = file_get_contents(dirname(__DIR__) . '/src/Config/mime.types.txt');
} else {
  $mimeText = file_get_contents($url);
}
$createMimeObj = new \CjsMime\CreateMime($mimeText);
$mimeData = $createMimeObj->generateMappingCode();
file_put_contents(dirname(__DIR__) . '/src/Config/MimeTypeConfig.php', $mimeData);
echo 'ok' . PHP_EOL;
