<?php
//type url here
$url="http://192.168.43.248:8090/request";
$data = array(
  'patient'      => $_POST['id'],
  'doc'    => 'd1'
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
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );

?>
