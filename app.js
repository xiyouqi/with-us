var express = require('express');
var app = express();

app.set('view engine', 'ejs');
app.use('/', express.static('./static'));

var server = app.listen(3000, function() {
  console.log('Listening on port %d', server.address().port);
});
