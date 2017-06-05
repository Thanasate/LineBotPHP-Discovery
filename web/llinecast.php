<?php
$access_token = 'ZgpRcbRD6kl5NglvR1B8kW/7dlDAPOPyLuNIs0yShmkcmS3enk4f4oSQhXNkBM/yITUy1Pm+E+9QJNSIUFAWJ4xUaogSDH2DCAdV0P/Fvgwc3k4N6IXH3bMHUQdGO98qQwbY8WrL3r3WIoB50R4X1gdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

$toUserId = ['Uce18597db9ebe2b656acffeea97a4bbf','Uc57b718f0d0275936224f51bf12906e5'];

$text = 'CN data details';

// Build message to reply back
$messages = [
	'type' => 'text',
	'text' => $text
];

// Make a POST Request to Messaging API to reply to sender
$url = 'https://api.line.me/v2/bot/message/multicast';
$data = [
	'to' => $toUserId,
	'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result . "\r\n";


echo "OK";