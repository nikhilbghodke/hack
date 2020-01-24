<?php

$url="http://192.168.43.248:8090/otp";
$apiKey=$_POST['apiKey'];
$otp=$_POST['otp'];

$data = array(
  'otp'      => $_POST['otp'],
  'id'    => $_POST['apiKey']
);
print_r(json_encode($data));
$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
print_r($context);
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );

print_r($response);
?>