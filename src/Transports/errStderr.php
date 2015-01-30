<?php

namespace phpMultiLog\Transports;

class errStderr {
	
	/**
	 * @param array $transportParameters Transport initialization parameters
	 */
	public function __construct($transportParameters = array()) {
	} // function __construct
	
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
		$logrecord = sprintf ( "App: %s - date: %s - errno: %s - errstr: %s - errfile: %s - errline: %s", $appID, $date, $errno, $errstr, $errfile, $errline ) . PHP_EOL;
		$stderr = fopen ( 'php://stderr', 'w' );
		if (! fwrite ( $stderr, $logrecord )) {
			error_log ( "Cannot write $logrecord to stderr" );
		}
		fclose ( $stderr );
	} // function log
} // class errStderr
