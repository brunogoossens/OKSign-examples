/**
 * OK!Sign API example
 *
 * Does a document exists on the OKSign platform?
 */

const request = require('request');

request({
  method: 'GET',
  url: 'https://www.oksign.be/services/rest/v1/document/exists',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'x-oksign-docid': '', // DocumentID
    'accept': 'application/json'
  }
}, (error, response, body_json) => {
  if (!error && response.statusCode == 200) {
    let body = JSON.parse(body_json);
    if(body.status == 'OK') {
      console.log('filename', body.reason.filename);
      console.log('template', body.reason.template);
    } else {
      console.log(body.reason);
    }
  }
});
