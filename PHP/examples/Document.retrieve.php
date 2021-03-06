<?php

/**
 * OK!Sign API example
 *
 * Retrieve a (signed) from the OKSign platform?
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

// request
$headers = array(
  'x-oksign-authorization' => '', // Organisational token
  'x-oksign-docid' => '', // DocumentID
  'accept' => 'application/json'
);

$client = new Client([ 'headers' => $headers ]);

// handle the response
$response = $client->get('https://www.oksign.be/services/rest/v1/document/retrieve');

if($response->getStatusCode() === 200){
  $raw = $response->getBody()->getContents();
  file_put_contents('newfile.pdf', $raw);
  echo 'File downloaded';
} else {
  echo 'Error';
}
