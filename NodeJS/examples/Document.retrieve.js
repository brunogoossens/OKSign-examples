/**
 * OK!Sign API example
 *
 * Retrieve a (signed) from the OKSign platform?
 */

const request = require('request');
const fs = require('fs');

request({
  method: 'GET',
  url: 'https://www.oksign.be/services/rest/v1/document/retrieve',
  headers: {
    'x-oksign-authorization': '', // Organisational token
    'x-oksign-docid': '', // DocumentID
    'accept': 'application/json'
  }
}, (error, response, body) => {
  if (!error && response.statusCode == 200) {
    console.log('Document downloaded');
  }
}).pipe(fs.createWriteStream('downloaded.pdf'));
