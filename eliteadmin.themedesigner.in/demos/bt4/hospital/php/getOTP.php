<?php
//type url here
$url="";
$data = array(
  'patient'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
  'doc'    => 'd1'
);

$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );

print_r($response);


?>