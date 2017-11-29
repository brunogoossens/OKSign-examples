<?php

/**
 * OK!Sign API example
 *
 * Upload a Form Descriptor describing the fields to be put on a previously uploaded document.
 * The Form Descriptor is generated in the Forms Editor.
 * In the Templates section of your account, click on the edit button.
 * The Forms Editor will open. Select the API button to get the Form Descriptor.
 */

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

// request
$headers = array(
  'x-oksign-authorization' => '', // Organisational token
  'x-oksign-docid' => '', // DocumentID
  'accept' => 'application/json',
  'content-type' => 'application/json'
);

// Generate this value from the API button in the Web interface
$payload = '
{
  "fields": [
    {
      "signerid": "bt_00000000-0000-0000-0000-000000000001",
      "checked": false,
      "comment": "",
      "fontfamily": "Courier",
      "fontstyle": "normal",
      "fontweight": "normal",
      "height": 100.03943888888891,
      "id": "beb0d3fb-a200-a3db-9d24-e1a796b46481",
      "inputtype": "CanvasSIG",
      "isvalidvalue": false,
      "letterspacing": "normal",
      "name": "SIG_field_1",
      "nbroflayers": "1",
      "pagenbr": 0,
      "posX": 286.8899611111112,
      "posY": 276.14192222222226,
      "readonly": false,
      "required": true,
      "signingoptions": {
        "eid": {},
        "pen": {
          "identification": {
            "actingas": "",
            "name": "Signer-1",
            "readonly": true,
            "required": true
          }
        },
        "tan": {
          "identification": {
            "actingas": "",
            "name": "Signer-1",
            "readonly": true,
            "required": true
          },
          "verification": {
            "gsm": {
              "msisdns": [],
              "readonly": false
            }
          }
        }
      },
      "textalign": "left",
      "width": 249.68521111111116
    }
  ]
}
';

$client = new Client([ 'headers' => $headers, 'body' => $payload ]);

// handle the response
$response = $client->post('https://www.oksign.be/services/rest/v1/formdesc/upload');

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
