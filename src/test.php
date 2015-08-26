<?php
require_once("phpMultiLog.php");
$logger = new phpMultiLog\phpMultiLog ( "TestsphpMultiLog", null, false );
$logger->errTransportAdd ( "errStderr" );
$logger->errTransportAdd ( "errFile", array (
		"filename" => "/tmp/phpMultiLogErr.log"
) );
$logger->errSecretsAdd ( array (
		"secretvar"
) );
$secretvar = "remove this";

$logger->logTransportAdd ( "sysSysLog", $logger::DEBUG );
$logger->logTransportAdd ( "sysFile", $logger::DEBUG, array (
		"filename" => "/tmp/phpMultiLogSys.log"
) );

$logger->logInfo("This is my message");

//throw new \Exception ( "My exception" );
//trigger_error ( "Test", E_USER_ERROR );
// $b=5 / 0;
// $c=5;
