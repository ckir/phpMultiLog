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
	}
	
	/**
	 * @param string $appID
	 * @param string $date
	 * @param string $logType
	 * @param integer $logLevel
	 * @param unknown $message
	 * @param array $context
	 */
	public function log($appID, $date, $logType, $logLevel, $message, $context) {
		$logrecord = sprintf ( "App: %s - date: %s - type: %s - level: %s - message: %s - context: %s", $appID, $date, $logType, $logLevel, $message, $context );
		$stdout = fopen ( 'php://stdout', 'w' );
		if (! fwrite ( $stdout, $logrecord )) {
			error_log ( "Cannot write $logrecord to stdout" );
		}
		fclose ( $stdout );
	} // function log()
	
} // class sysSysLog

?>