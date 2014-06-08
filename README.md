rest-client
============

```php
include 'vendor/autoload.php';

// define the authentication type
$basic = new \Michcald\RestClient\Auth\Basic();
$basic->setUsername('the-username')
  ->setPassword('the-password');

$client = new \Michcald\RestClient\Client();
$client->setAuth($basic);

$response = $client->get('the-url', array('page' => 1));

$statusCode = $response->getStatusCode();
$contentType = $response->getContentType();
$content = $response->getContent();

// same for post(), put(), delete()

```
