<?php
/**
 * logz
 * PHP logging class
 *
 * @author xero harrison / http://xero.nu
 * @version 1.0
 * @copyright creative commons attribution-shareAlike 3.0 Unported
 * @license http://creativecommons.org/licenses/by-sa/3.0/ 
 */
class logz {
	/**
	 * @var filename
	 */
	protected $file;
	/**
	 * @var logs directory
	 */
	protected $dir;
	/**
	 * constructor
	 *
	 * @param string $dir the server log directory
	 * @param string $file the log filename
	 */
	function __construct($dir, $file) {
		if(!is_dir($dir)) {
			mkdir($dir, 0755, true);
		}
		$this->dir = $dir;
		$this->file = $file;
	}
	/**
	 * erase the log
	 */
	function clear() {
		@unlink($this->dir.$this->file);
	}
	/**
	 * write to log
	 *
	 * @param string $data the content to be written
	 * @param string $dateFormat php style date format string (default = 'r')
	 */
	function write($data, $dateFormat='r') {
		file_put_contents(
			$this->dir.$this->file, 
			date($dateFormat).' ['.$_SERVER['REMOTE_ADDR'].'] '.$data.PHP_EOL, 
			FILE_APPEND | LOCK_EX
		);
	}
}

?>