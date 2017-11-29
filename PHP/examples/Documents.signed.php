<?php

/**
 * OK!Sign API example
 *
 * Get a list of docids of signed documents in a defined timeframe
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

$endDate = new \DateTime("now", new DateTimeZone('UTC'));
$startDate = clone $endDate;
$startDate->modify('-1 hour');

// request
$headers = array(
  'x-oksign-authorization' => '', // Organisational token
  'x-oksign-starttime' => $startDate->format(DateTime::ATOM),
  'x-oksign-endtime' => $endDate->format(DateTime::ATOM),
  'accept' => 'application/json'
);

$client = new Client([ 'headers' => $headers ]);

// handle the response
$response = $client->get('https://www.oksign.be/services/rest/v1/documents/signed');

if($response->getStatusCode() === 200){
  $response = json_decode($response->getBody()->getContents());
  if($response->status === 'OK'){
    if(empty($response->reason)){
      echo 'No signed documents';
    } else {
      foreach ($response->reason as $signedDoc) {
        print_r($signedDoc->fields_completed);
        print_r($signedDoc->signed_doc);
        print_r($signedDoc->source_doc);
        print_r($signedDoc->ts);
      }
    }
  } else {
    echo 'Error: ' . $response->reason;
  }
} else {
  echo 'Error';
}
