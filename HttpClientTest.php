<?php
require_once __DIR__ . '/vendor/autoload.php';

use Nesrine\HttpClient\HttpClient;


$client = new HttpClient();

echo "Test GET request:\n";
try {
    $options = ['headers' => ['Content-Type: application/json'], 'body' => ''];
    $client->get('https://jsonplaceholder.typicode.com/todos/1', $options);
    $response = $client->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Body: " . $response->getBody() . "\n\n";

echo "Test POST request:\n";
try {
    $data = ['title' => 'foo', 'body' => 'bar', 'userId' => 4];
    $options = ['headers' => ['Content-Type: application/json']];

    $client->post('https://jsonplaceholder.typicode.com/posts', $data, $options);
    $response = $client->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Body: " . $response->getBody() . "\n\n";

echo "Test PUT request:\n";
try {
    $data = ['title' => 'l', 'body' => 'ji', 'userId' => 5];
    $options = ['headers' => ['Content-Type: application/json']];

    $client->put('https://jsonplaceholder.typicode.com/posts/1', $data, $options);
    $response = $client->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Body: " . $response->getBody() . "\n\n";

echo "Test DELETE request:\n";
try {
    $data = ['title' => 'l', 'body' => 'ji', 'userId' => 5];
    $options = ['headers' => ['Content-Type: application/json']];

    $client->delete('https://jsonplaceholder.typicode.com/posts/1', $data, $options);
    $response = $client->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
echo "Status Code: " . $response->getStatusCode() . "\n";
echo "Body: " . $response->getBody() . "\n\n";