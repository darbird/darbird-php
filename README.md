# DarbirdSMS API Client

### Developed by Adenagbe Emmanuel (http:darbird.com)
### Email: emmadenagbe@gmail.com


Open `config.test.php` and change `AUTH_KEY` , `CUSID` and `SENDER_ID` value  
Note: A phone number in full international format includes a plus sign (+) followed by the country code, city code, and local phone number.


## Send SMS

```require_once('autoload.php');
$db = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {

//Change data type to 0 For Plain Message
//Change data type to 1 For Unicode Message

 $mobile_no = '+23409xxxxxxxx';
 $message = 'do you like sport?';
 $data_type = '1';
    $response = $db->sendSMS($mobile_no, $message, $data_type);
    
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------

*/
```

## Send Voice

```require_once('autoload.php');
$db = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {


 $mobile_no = '+23409xxxxxxxx';
 $message = 'do you like sport?';
    $response = $db->sendSMS($mobile_no, $message, $data_type);
    
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------
{"code":"ok","message":"Successfully Send","balance":xxx,"user":"xxxxxxxxxxxx"}
*/
```

## Send MMS

```require_once('autoload.php');
$db = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {


 $mobile_no = '+23409xxxxxxxx';
 $message = 'do you like sport?';
 $media_url = 'https://xxx.com';
$response = $db->sendMMS($mobile_no, $message,$media_url);
    
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------
{"code":"ok","message":"Successfully Sent","balance":xxx,"user":"xxxxxxxxxxxxxx"}
*/
```

## Send Auth

```require_once('autoload.php');
$db = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {


 $mobile_no = '+23409xxxxxxxx';
 $token_lenght = '6'; // Number of token to be generated <=8
 $msg_type = 'plain'; // you can change to voice
$response = $db->sendAuthty($mobile_no, $message,$media_url);
    
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------
{"code":"ok","message":"Successfully Send"}
*/
```


## Verify Auth

```require_once('autoload.php');
$db = new DarbirdClass(CUSID,AUTH_KEY,SENDERID);

try {


$mobile_no = '+23409xxxxxxxx';
$auth_code = '6'; // Number of token to be generated <=8
$response = $db->sendVerifyAuthty($mobile_no, $auth_code);
    
    print_r($response);

} catch (Exception $e) {
    
    echo $e->getMessage();
}

/*

Response in Failed
--------

Failed | Message Contains Spam Word | HTTP Error Code : 422


Response in Success
---------
{"code":"ok","message":"Account verified"}
*/
```