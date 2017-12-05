/**
 * OK!Sign API example
 *
 * Retrieve info about your credits balance
 */

const request = require('request');

request({
  method: 'GET',
  url: 'https://www.oksign.be/services/rest/v1/credits/retrieve',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'accept': 'application/json'
  }
}, (error, response, body_json) => {
  if (!error && response.statusCode == 200) {
    let body = JSON.parse(body_json);
    if(body.status == 'OK') {
      console.log('duration', body.reason.extratime.duration);
      console.log('quantity', body.reason.quantity);
      console.log('validuntil', body.reason.validuntil);
    } else {
      console.log(body.reason);
    }
  }
});
