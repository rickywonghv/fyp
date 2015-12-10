<?php

// create a new cURL resource
$payload = file_get_contents('http://freegeoip.net/json/');
print_r($payload);
print_r($ipresponse=json_decode($payload));
print_r($ipresponse['ip']);

//printf($payload['google']['loader']['ClientLocation']);
//printf($payload(google.loader.ClientLocation));

 ?>
