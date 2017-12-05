/**
 * OK!Sign API example
 *
 * Get a list of docids of signed documents in a defined timeframe
 */

const request = require('request');
const moment = require ('moment');

request({
  method: 'GET',
  url: 'https://www.oksign.be/services/rest/v1/documents/signed',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'accept': 'application/json',
    'x-oksign-starttime': moment().subtract(1, 'hour').format(),
    'x-oksign-endtime': moment().format()
  }
}, (error, response, body_json) => {
  if (!error && response.statusCode == 200) {
    let body = JSON.parse(body_json);
    if(body.status == 'OK') {
      if(body.reason){
        console.log(body.reason);
      } else {
        console.log('No signed documents');
      }
    } else {
      console.log(body.reason);
    }
  }
});
