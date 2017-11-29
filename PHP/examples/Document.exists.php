<?php

/**
 * OK!Sign API example
 *
 * Does a document exists on the OKSign platform?
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
$response = $client->get('https://www.oksign.be/services/rest/v1/document/exists');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  if($response->status === 'OK'){
    print_r($response->reason->filename);
    print_r($response->reason->template);
  } else {
    echo 'Error: ' . $response->reason;
  }
} else {
  echo 'Error';
}
