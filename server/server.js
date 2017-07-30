'use strict';

var loopback = require('loopback');
var boot = require('loopback-boot');
var body_parser = require("body-parser");
var request = require("request");

var app = module.exports = loopback();

const SELF_URL = "http://localhost:3000"

function validate_user() {	// todo
	return null;
}

app.use(body_parser.urlencoded({ extended: true }));
app.use(body_parser.json());
app.use(function(req, res, next) {
	res.setHeader('Access-Control-Allow-Origin', '*');
	next();
});

app.start = function() {
	// start the web server
	return app.listen(function() {
		app.emit('started');
		var baseUrl = app.get('url').replace(/\/$/, '');
		console.log('Web server listening at: %s', baseUrl);
		if (app.get('loopback-component-explorer')) {
			var explorerPath = app.get('loopback-component-explorer').mountPath;
			console.log('Browse your REST API at %s%s', baseUrl, explorerPath);
		}
	});
};

app.post('/api/createuser', function(req, ret) {
	var username = req.body.username;
	var email = req.body.email;
	var location = req.body.location;
	var fname = req.body.fname;
	var lname = req.body.lname;
	var tags = req.body.tags;

	console.log(username, fname, lname, tags);

	var error = validate_user(username, fname, location, lname);

	if (!error) request.post(SELF_URL + '/api/users', {form:{
		user_id: 999,
		user_name: username,
		email: email,
		first_name: fname,
		last_name: lname,
		skills: tags,
		location: location,
	}});
	ret.send({error: error});
});

// Bootstrap the application, configure models, datasources and middleware.
// Sub-apps like REST API are mounted via boot scripts.
boot(app, __dirname, function(err) {
	if (err) throw err;

	// start the server if `$ node server.js`
	if (require.main === module)
		app.start();
});
