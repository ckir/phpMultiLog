<?php

namespace phpMultiLog\Transports;

class errStderrJson {
	
	/**
	 *
	 * @param array $transportParameters
	 *        	Transport initialization parameters
	 */
	public function __construct($transportParameters = array()) {
	} // function __construct
	
	/**
	 */
	function __destruct() {
	} // function __destruct
	
	/**
	 * Writes a record to stderr
	 *
	 * @param string $appID        	
	 * @param string $date        	
	 * @param integer $errno        	
	 * @param string $errstr        	
	 * @param string $errfile        	
	 * @param string $errline        	
	 * @param string $errcontext        	
	 */
	public function log($appID, $date, $errno, $errstr, $errfile, $errline, $errcontext) {
		$logrecord = array ();
		$logrecord ['appId'] = $appID;
		$logrecord ['date'] = $date;
		$logrecord ['errno'] = $errno;
		$logrecord ['errstr'] = $errstr;
		$logrecord ['errfile'] = $errfile;
		$logrecord ['errline'] = $errline;
		$logrecord ['errcontext'] = $errcontext;
		$logrecord = json_encode ( $logrecord, JSON_UNESCAPED_UNICODE ) . PHP_EOL;
		
		if (! @fwrite ( STDERR, $logrecord )) {
			error_log ( "Cannot write $logrecord to stderr" );
		}
	} // function log
} // class errStderrJson
