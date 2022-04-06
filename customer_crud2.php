<?php
$serverName = "tcp:cosc3380-zoo.database.windows.net,1433";
$connectionOptions = array("Database"=>"ZooDB",
	"Uid"=>"dhphan3", "PWD"=>"MyPassword");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn){
	echo"Connection establsihed.<br />
}
else{
	echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>