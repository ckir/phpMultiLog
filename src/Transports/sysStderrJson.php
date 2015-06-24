<?php

namespace phpMultiLog\Transports;

/**
 *
 * @author user
 *        
 */
class sysStderrJson {
	
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
		$logrecord = array ();
		$logrecord ['appID'] = $appID;
		$logrecord ['date'] = $date;
		$logrecord ['logType'] = $logType;
		$logrecord ['logLevel'] = $logLevel;
		$logrecord ['message'] = $message;
		$logrecord ['context'] = $context;
		$logrecord = json_encode ( $logrecord, JSON_UNESCAPED_UNICODE ) . PHP_EOL;
		
		if (! @fwrite ( STDERR, $logrecord )) {
			error_log ( "Cannot write [$logrecord] to stderr" );
		}
	} // function log()
} // class sysStderr

?>