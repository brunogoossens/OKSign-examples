<?php

/**
 * OK!Sign API example
 *
 * Retrieve info about your credits balance
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

// request
$headers = array(
  'x-oksign-authorization' => '', // Organisational token
  'accept' => 'application/json'
);

$client = new Client([ 'headers' => $headers ]);

// handle the response
$response = $client->get('https://www.oksign.be/services/rest/v1/credits/retrieve');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  print_r($response->extratime);
  print_r($response->quantity);
  print_r($response->validuntil);
} else {
  echo 'Error';
}
