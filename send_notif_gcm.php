<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyBwsNSatm-pheq6yX6x7m3LTdJyxKqTlQ4' );
//$registrationIds = array( $_GET['id'] );
$registrationIds = $_POST['regids'];
$actual_msg = $_POST['notif_msg'];
// prep the bundle
$msg = array
(
	'message' 	=> $actual_msg,
	'title'		=> 'Notification',
	'subtitle'	=> 'Subtitle',
	'tickerText'	=> $actual_msg,
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;