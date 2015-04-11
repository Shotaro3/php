<?php

trait Log {

	public static function write($method, $data) {
		$file_name = ProjectConfig::DIR_LOG.ProjectConfig::FILE_LOG_ALL;
		$line      = self::ganareteLogText($method, $data);

		new FileWrite($file_name, $line);
	}

	/**
	 * ログの書き込みフォーマット
	 * %1$s 日付
	 * %2$s スクリプト名
	 * %3$s なんかテキスト
	 */
	private static function ganareteLogText($method, $data) {
		$format     = '%1$s %2$s▫ %3$s︎'."\n";
		$head       = date("Y/m/d (D) H:i:s", time());
		$identifier = $method;

		$line = sprintf($format, $head, $identifier, $data);

		return $line;
	}
}
