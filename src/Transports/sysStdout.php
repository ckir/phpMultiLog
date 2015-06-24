<?php

namespace phpMultiLog\Transports;

/**
 *
 * @author user
 *        
 */
class sysStdout {
	
	/**
	 *
	 * @param array $transportParameters
	 *        	Transport initialization parameters
	 */
	function __construct($transportParameters = array()) {
	} // function __construct
	
	/**
	 */
	function __destruct() {
	} // function __destruct
	
	/**
	 *
	 * @param string $appID        	
	 * @param string $date        	
	 * @param string $logType        	
	 * @param integer $logLevel        	
	 * @param unknown $message        	
	 * @param array $context        	
	 */
	public function log($appID, $date, $logType, $logLevel, $message, $context) {
		$logrecord = sprintf ( "App: %s - date: %s - type: %s - level: %s - message: %s - context: %s", $appID, $date, $logType, $logLevel, $message, $context ) . PHP_EOL;
		
		if (! @fwrite ( STDOUT, $logrecord )) {
			error_log ( "Cannot write [$logrecord] to stdout" );
		}
	} // function log()
} // class sysStdout

?>