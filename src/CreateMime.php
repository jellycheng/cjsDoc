<?php
namespace CjsMime;
class CreateMime
{
	protected $mime_types_text;
	
	public function __construct($mime_types_text)
	{
		$this->mime_types_text = $mime_types_text;
	}

	public function generateMapping()
	{
		$mapping = array();
		$lines = explode("\n", $this->mime_types_text);
		foreach ($lines as $line) {
			$line = trim(preg_replace('~\\#.*~', '', $line));
			$parts = $line ? array_values(array_filter(explode("\t", $line))) : array();
			if (count($parts) === 2) {
				$mime = trim($parts[0]);
				$extensions = explode(' ', $parts[1]);
				foreach ($extensions as $extension) {
					$extension = trim($extension);
					if ($mime && $extension) {
						$mapping['mimes'][$extension][] = $mime;
						$mapping['extensions'][$mime][] = $extension;
					}
				}
			}
		}
		return $mapping;
	}

	public function generateMappingCode()
	{
		$mapping = $this->generateMapping();
		$mapping_export = var_export($mapping, true);
		return "<?php return $mapping_export;";
	}
}
