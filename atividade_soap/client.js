var soap = require('soap');
const express = require('express');

var url = 'http://localhost:3000/Calculator?wsdl';
var args = { name: 'value' };

var mdcCalculator;

soap.createClient(url, function (err, client) {
	if (err != null) {
		console.log("client create error: ", err);
	}
	if (client != null) {
		// console.log(client.describe());
		client.CalculateMDC({ x: 1920, y: 1080}, function(err, result) {
		    console.log("result: ", result);
		});
		mdcCalculator = client;
	}
});

const app = express();
app.use(express.json());

app.get('/', (req, res) => {
    res.send({message: "Server online"});
});

app.post('/aspect-ratio', (req, res) => {
    const data = {x: req.body.width, y: req.body.height};
    mdcCalculator.CalculateMDC(data, function(err, res2) {
        res.status(200).send({data: {"aspect-ratio": `${req.body.width/res2.MDC}:${req.body.height/res2.MDC}`}});
    });
});

app.listen(3001, () => {
    console.log('client initialized... open http://localhost:3001');
});