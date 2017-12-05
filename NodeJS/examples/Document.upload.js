/**
 * OK!Sign API example
 *
 * Upload a PDF or Word document that needs to be completed and/or signed.
 */

const request = require('request');
const fs = require('fs');

fs.readFile('/path/to/file.pdf', (err, data) => {
  if (err) throw err;
  request({
    method: 'POST',
    url: 'https://www.oksign.be/services/rest/v1/document/upload',
    headers: {
      'x-oksign-authorization': '', // Organisational token
      'accept': 'application/json',
      'x-oksign-filename': 'newfilename.pdf',
      'content-type': 'application/pdf'
    },
    body: data
  }, (error, response, body_json) => {
    if (!error && response.statusCode == 200) {
      let body = JSON.parse(body_json);
      if(body.status == 'OK') {
        console.log('documentID: ', body.reason);
      } else {
        console.log(body.reason);
      }
    }
  });
});
