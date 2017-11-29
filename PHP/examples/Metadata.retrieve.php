<?php

/**
 * OK!Sign API example
 *
 * Retrieve the metadata of a (signed) document.
 * The medata contains more info regarding the signature(s) and the content of the completed fields.
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
$response = $client->get('https://www.oksign.be/services/rest/v1/metadata/retrieve');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  if($response->status === 'OK'){
    print_r($response->reason);
  } else {
    echo 'Error: ' . $response->reason;
  }
} else {
  echo 'Error';
}
