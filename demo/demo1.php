<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$filename = 'abc/xxx.png.css.js.woff.jpg?v=12';
$uriPath = $filename;
if(preg_match('/[?]+/', $uriPath)){
	$uriPathTmp = explode('?', $uriPath);
	$uriPath = $uriPathTmp[0];
}
$reg = "/\.(js|css|jpg|jpeg|gif|png|ico|swf|bmp|tiff|svg|doc|docx|txt|rtf|pdf|xls|xlsx|ppt|pptx|woff)$/i";
if(preg_match($reg, strrchr($uriPath, '.'))) {//对静态资源
    $mimeTypesObj = new \CjsMime\MimeTypes();
	$mimeType = $mimeTypesObj->getMimeType(\CjsMime\MimeTypes::getFileExt($filename));
	echo $mimeType . PHP_EOL;
	if($mimeType) {
		//header('Content-type: ' . $mimeType);
	}
}
