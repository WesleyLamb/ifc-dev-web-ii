const express = require('express');
const soap = require('soap');

var calculator = {
    MDCService: {
        MDCPort: {
            CalculateMDC: function(args) {
                const x = args.x;
                const y = args.y;
                let a, b;
                if (x > y) {
                    a = x;
                    b = y;
                } else {
                    a = y;
                    b = x;
                }

                while ((a % b) > 0)  {
                    R = a % b;
                    a = b;
                    b = R;
                }
                return {MDC: b};
            }
        }
    }
}

var xml = require('fs').readFileSync('calculator.wsdl', 'utf8');

var app = express();

app.listen(3000, function() {
    soap.listen(app, '/Calculator', calculator, xml, function() {
        console.log('server initialized... open http://localhost:3000/Calculator?wsdl');
    });
});