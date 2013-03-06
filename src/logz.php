<?php
/**
 * logz
 * PHP logging class
 *
 * @author xero harrison / http://xero.nu
 * @version 1.11
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
	 * clear the log
	 */
	function clear() {
		file_put_contents($this->dir.$this->file, '');
	}
	/**
	 * delete the log
	 */
	function destroy() {
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
			date($dateFormat).' ['.$this->getIP().'] '.$data.PHP_EOL, 
			FILE_APPEND | LOCK_EX
		);
	}
	/**
	 * get ipaddress of current user
	 *
	 * @return string ipaddress
	 */
	function getIP() {
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
		    return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    return $_SERVER['REMOTE_ADDR'];
		}
	}
	/**
	 * get the number of lines in a log file
	 *
	 * @return int line count
	 */
	function count() {
		$linecount = 0;
		$handle = fopen($this->dir.$this->file, "r");
		while(!feof($handle)){
		  $line = fgets($handle);
		  $linecount++;
		}
		fclose($handle);
		$line = null;
		return $linecount-1; //last line is empty
	}
}

?>