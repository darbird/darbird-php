<?php

// Generate OTP
// ===========================

require_once('autoload.php');

$apiClient = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {

	$lifetime = 18800; // in second
	$response = $apiClient->sendSMS("+23408103141424","I love you Ademide");
	if (!isset($response))
	{
		throw new Exception("Unable to generate an OTP");
	}

	
	dd($response);
	
} catch (Exception $e) {
	
	echo $e->getMessage();
}