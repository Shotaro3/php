<?php

final class Log extends FileUtility {
    /**
     * ログの書き込みフォーマット
     * %1$s 日付
     * %2$s なんかテキスト
     */
    const TEST = 'test';
    const FORMAT_TEST = '%1$s ▫ %2$s︎'."\n";


    private $format;
    private $head;

	public function __construct() {
        $this->format = [
            self::TEST => self::FORMAT_TEST,
        ];

        $file_name = ProjectConfig::DIR_LOG.ProjectConfig::FILE_LOG_ALL;
        parent::__construct($file_name);

	}

	public function write($type,$data) {
		$line = $this->ganareteLogText($type,$data);
		parent::write($line);
	}

	private function ganareteLogText($type,$data) {
		$this->head = date("Y/m/d (D) H:i:s", time());

		$line = sprintf($this->format[$type], $this->head, $data);

		return $line;
	}

}
