/**
 * OK!Sign API example
 *
 * Remove a document from the OKSign platform?
 */

const request = require('request');

request({
  method: 'DELETE',
  url: 'https://www.oksign.be/services/rest/v1/document/remove',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'x-oksign-docid': '', // DocumentID
    'accept': 'application/json'
  }
}, (error, response, body_json) => {
  if (!error && response.statusCode == 200) {
    let body = JSON.parse(body_json);
    if(body.status == 'OK') {
      console.log('Document removed');
    } else {
      console.log(body.reason);
    }
  }
});
