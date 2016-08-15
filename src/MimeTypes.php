<?php
namespace CjsMime;

class MimeTypes {

	public function __construct($mapping = null)
	{
		if ($mapping === null) {
			$this->mapping = require(__DIR__ . '/Config/MimeTypeConfig.php');
		} else {
			$this->mapping = $mapping;
		}
	}

	public function getMimeType($extension)
	{
		if (!empty($this->mapping['mimes'][$extension])) 
		{
			return $this->mapping['mimes'][$extension][0];
		}
		return null;
	}

	public function getExtension($mime_type)
	{
		if (!empty($this->mapping['extensions'][$mime_type])) 
		{
			return $this->mapping['extensions'][$mime_type][0];
		}
		return null;
	}

	public function getAllMimeTypes($extension)
	{
		if (isset($this->mapping['mimes'][$extension])) 
		{
			return $this->mapping['mimes'][$extension];
		}
		return array();
	}

	public function getAllExtensions($mime_type)
	{
		if (isset($this->mapping['extensions'][$mime_type])) 
		{
			return $this->mapping['extensions'][$mime_type];
		}
		return array();
	}

	public static function getFileExt($filename) {
		$tmpAry  = explode('.', $filename);
		$ext = strtolower(array_pop($tmpAry));
		if(preg_match('/[?]+/', $ext)){
			$extTmp = explode('?', $ext);
			$ext = $extTmp[0];
		}
		return $ext;
	}
	
}
