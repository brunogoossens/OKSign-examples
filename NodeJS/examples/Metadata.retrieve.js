/**
 * OK!Sign API example
 *
 * Retrieve the metadata of a (signed) document.
 * The medata contains more info regarding the signature(s) and the content of the completed fields.
 */

const request = require('request');

request({
  method: 'GET',
  url: 'https://www.oksign.be/services/rest/v1/metadata/retrieve',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'x-oksign-docid': '', // DocumentID
    'accept': 'application/json'
  }
}, (error, response, body_json) => {
  if (!error && response.statusCode == 200) {
    let body = JSON.parse(body_json);
    if(body.status == 'OK') {
      console.log(body.reason);
    } else {
      console.log(body.reason);
    }
  }
});
