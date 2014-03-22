<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

$client = new \Michcald\RestClient\Client();
$response = $client->post('http://restclient.local/tests/server/post.php', array(
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'file'       => '@../composer.jsons'
));

?>

<h2>Response status code</h2>
<?= $response->getStatusCode() ?>

<h2>Response content type</h2>
<?= $response->getContentType() ?>

<h2>Response content</h2>
<?= $response->getContent() ?>