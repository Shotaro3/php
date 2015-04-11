<?php

class FileWrite {

	public function __construct($file_name, $text) {
		if ($fp = fopen($file_name, "a")) {

			flock($fp, LOCK_SH);

			fwrite($fp, $text);

			flock($fp, LOCK_UN);

			fclose($fp);
		}
	}
}