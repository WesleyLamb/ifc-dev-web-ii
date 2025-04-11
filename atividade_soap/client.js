var soap = require('soap');
var url = 'http://localhost:3000/Calculator?wsdl';
var args = { name: 'value'};
soap.createClient(url, function(err, client) {
  if(err != null) {
    console.log("client create error: ", err);
  }

  if(client != null) {
    //console.log(client.describe());
    client.CalculateMDC({ x: 30, y: 15}, function(err, result) {
        console.log("result: ", result);
    });
  }
});