<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

$client = new \Michcald\RestClient\Client();
$response = $client->post('http://restclient.local/tests/server/post.php', array(
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'file'       => '@' . realpath('index.php')
));

echo $response->getContent();