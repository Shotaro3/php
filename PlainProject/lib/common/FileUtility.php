<?php

class FileUtility {

	private $file_name;

	public function __construct($file_name) {
		$this->file_name = $file_name;
	}

	protected function write($text) {
		if ($fp = fopen($this->file_name, "a")) {

			flock($fp, LOCK_SH);

			fwrite($fp, $text);

			flock($fp, LOCK_UN);

			fclose($fp);
		}
	}
}