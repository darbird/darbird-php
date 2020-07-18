<?php
/**
 * @package        Darbird SMS Api
 * @author        Darbird (developers@darbird.com)
 * @copyright    Copyright (c) 2019, Darbird.
 * @link        http://darbird.com
 */

/**
 * @param string $data  String data
 *
 * @return string
 */
function dd($data)
{
    echo "<pre>" . print_r($data, true) . "</pre>";exit;
}

/* SMSGatewayApi class */

class DarbirdClass
{
    private $authKey;

    private $cusID;

    private $sendThrough;

    private $baseUrl;

    private $senderID;

    public function __construct($authKey, $cusID, $senderID)
    {
        $this->baseUrl = "https://api.darbird.com/api/";
        $this->authKey = $authKey;
        $this->cusID = $cusID;
        $this->senderID = $senderID;
    }

/**
 * @param string     $mobile_no  The mobile number where message will be sent.
 * @param string     $message The message txt that will be sent.
 * @param string        $senderId The id of the device to messgae will be sent.
 * @return array     Returns The array containing information about the message.
 * @throws Exception If there is an error while sending a message.
 */
    public function sendSMS($mobile_no, $message, $data_type = '1')
    {
        $url = $this->baseUrl . "sms/api";
        $postData = array('to' => $mobile_no, 'sms' => $message, 'from' => $this->senderID, 'unicode' => $data_type, 'action' => 'send-sms');
        return $this->sendRequest($url, $postData);
    }

    /**
     * @param string     $mobile_no  The mobile number where message will be sent.
     * @param string     $message The message txt that will be sent.
     * @param string     $senderId The id of the device to messgae will be sent.
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendVoice($mobile_no, $message, $data_type = '1')
    {
        $url = $this->baseUrl . "sms/api";
        $postData = array('to' => $mobile_no, 'sms' => $message, 'from' =>$this->senderID, 'unicode' => $data_type, 'action' => 'send-sms', 'voice' => '1');
        return $this->sendRequest($url, $postData);
	}
	


    /**
     * @param string     $mobile_no  The mobile number where message will be sent.
     * @param string     $message The message txt that will be sent.
     * @param string     $senderId The id of the device to messgae will be sent.
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendMMS($mobile_no, $message, $media_url)
    {
        $url = $this->baseUrl . "sms/api";
        $postData = array('to' => $mobile_no, 'sms' => $message, 'from' =>$this->senderID, 'action' => 'send-sms', 'mms' => '1', 'media_url' => $media_url);
        return $this->sendRequest($url, $postData);
    }

    /**
     * @param string     $mobile_no  The mobile number where message will be sent.
     * @param string     $message The message txt that will be sent.
     * @param string     $senderId The id of the device to messgae will be sent.
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendSchedule($mobile_no, $message, $schedule)
    {
        $url = $this->baseUrl . "sms/api";
        $postData = array('to' => $mobile_no, 'sms' => $message, 'from' =>$this->senderID, 'action' => 'send-sms', 'schedule' => $schedule);
        return $this->sendRequest($url, $postData);
    }

    /**
     * @param string     $mobile_no  The mobile number where message will be sent.
     * @param string     $message The message txt that will be sent.
     * @param string     $senderId The id of the device to messgae will be sent.
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendAuthty($to_number, $token_lenght, $msg_type)
    {
        $url = $this->baseUrl . "auth/autity";
        $postData = array('to_number' => $to_number, 'token_lenght' => $token_lenght, 'from' =>$this->senderID, 'msg_type' => $msg_type);
        return $this->sendRequest($url, $postData);
    }

    /**
     * @param string     $mobile_no  The mobile number where message will be sent.
     * @param string     $message The message txt that will be sent.
     * @param string     $senderId The id of the device to messgae will be sent.
     * @return array     Returns The array containing information about the message.
     * @throws Exception If there is an error while sending a message.
     */
    public function sendVerifyAuthty($to_number, $auth_code)
    {
        $url = $this->baseUrl . "auth/confirm-token";
        $postData = array('to_number' => $to_number, 'auth_code' => $auth_code);
        return $this->sendRequest($url, $postData);
    }

    /**
     * @param string $url The url of request destination
     * @param array $postData The array of post data
     *
     * @return mixed     The result containing mixed data
     * @throws Exception If there is an error while sending request.
     */
    public function sendRequest($url, $postData = array())
    {
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'X-Darbird-Token:' . $this->cusID,
            'X-Darbird-Key:' . $this->authKey,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        $response_string = curl_exec($ch);
        curl_close($ch);

        return $response_string;

    }
}
