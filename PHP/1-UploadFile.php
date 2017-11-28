<?php

/**
 * OK!Sign API example
 *
 * How to upload a document.
 */

require 'vendor/autoload.php';

use GuzzleHttp\Client;

// request
$headers = array(
  'x-oksign-authorization' => '', // add your own Organisational token
  'accept' => 'application/json',
  'x-oksign-filename' => 'newfile.pdf',
  'content-type' => 'application/pdf'
);

$payload = file_get_contents('/Users/brunogoossens/Downloads/test.pdf');

$client = new Client([ 'headers' => $headers, 'body' => $payload ]);

// handle the response
$response = $client->post('https://www.oksign.be/services/rest/v1/document/upload');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  echo 'documentID: ' . $response->reason;
} else {
  echo 'Upload Failed';
}
