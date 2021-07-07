<?php

$data = [
    'phone' => '+263782683862', // Receivers phone
    'body' => 'Hello, Elton Mayo!', // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$token = 'klqbtdv35u9htj7w';
// $instanceId = '777';
$url = 'https://api.chat-api.com/instance241211/message?token='.$token;
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);

                 ?>