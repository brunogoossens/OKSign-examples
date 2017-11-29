<?php

/**
 * OK!Sign API example
 *
 * Upload a PDF or Word document that needs to be completed and/or signed.
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

// request
$headers = array(
  'x-oksign-authorization' => '', // Organisational token
  'accept' => 'application/json',
  'x-oksign-filename' => 'newfilename.pdf',
  'content-type' => 'application/pdf'
);

$payload = file_get_contents('/path/to/file.pdf');

$client = new Client([ 'headers' => $headers, 'body' => $payload ]);

// handle the response
$response = $client->post('https://www.oksign.be/services/rest/v1/document/upload');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  if($response->status === 'OK'){
    echo 'documentID: ' . $response->reason;
  } else {
    echo 'Error: ' . $response->reason;
  }
} else {
  echo 'Upload Failed';
}
