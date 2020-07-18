<?php

// SEND YOUR FIRST MESSAGE
// ===========================

require_once('autoload.php');

$apiClient = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {

	$lifetime = 18800; // in second
	$response = $apiClient->sendSMS("+234081xxxxxxx","Welcome to Darbird");
	if (!isset($response))
	{
		throw new Exception("Unable to generate an OTP");
	}

	
	dd($response);
	
} catch (Exception $e) {
	
	echo $e->getMessage();
}