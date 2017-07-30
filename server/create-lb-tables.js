var server = require('./server');
var ds = server.dataSources.mysqldb;

if(ds==null){
	console.log("ds is null");
	return;
}
var lbTables = ['users'];
console.log("after lbtables");
ds.automigrate(lbTables, function(er) {
  if (er) {
  	console.log("Error occured while calling automigrate");
  	throw er;
  }	
  console.log('Loopback tables [' - lbTables - '] created in ', ds.adapter.name);
  ds.disconnect();
});
