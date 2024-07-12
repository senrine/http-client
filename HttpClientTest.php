<?php
require_once __DIR__ . '/vendor/autoload.php';

use Nesrine\HttpClient\HttpClient;


$client = new HttpClient();

echo "Test GET request:\n";
try {
    $options = ['headers' => ['Content-Type: application/json'], 'body' => ''];
    $client->get('https://jsonplaceholder.typicode.com/todos/1', $options);
    $response = $client->send();
}catch (Exception $e) {
    echo $e->getMessage();
}
echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Body: " . $response->getBody() . "\n\n";

