<?php

/**
 * OK!Sign API example
 *
 * Remove a document from the OKSign platform?
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
$response = $client->delete('https://www.oksign.be/services/rest/v1/document/remove');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  if($response->status === 'OK'){
    echo 'Document removed';
  } else {
    echo 'Error: ' . $response->reason;
  }
} else {
  echo 'Error';
}
