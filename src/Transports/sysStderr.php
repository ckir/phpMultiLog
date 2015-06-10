<?php

namespace phpMultiLog\Transports;

/**
 *
 * @author user
 *        
 */
class sysStderr {
	
	protected $stderr;
	
	/**
	 *
	 * @param array $transportParameters
	 *        	Transport initialization parameters
	 */
	function __construct($transportParameters = array()) {
		$this->stderr = fopen ( 'php://stderr', 'w' );
		if (! $this->stderr) {
			error_log ( "Cannot open stderr" );
		}
	} // function __construct
	
	/**
	 */
	function __destruct() {
		fclose ( $this->stderr );
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
		if ($this->stderr) {
			if (! fwrite ( $this->stderr, $logrecord )) {
				error_log ( "Cannot write [$logrecord] to stderr" );
			}
		}
	} // function log()
} // class sysStderr

?>