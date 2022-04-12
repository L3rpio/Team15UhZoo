<?php
//ob_start();
$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username = "zooadmin";
$password = "Lovec++123";
$database = "uh_zoo";

// $connectionOptions = array("Database"=>"uh_zoo",
//     "Uid"=>"zooadmin", "PWD"=>"Lovec++123");
$conn = new mysqli($serverName, $username, $password, $database);
//$conn = new mysqli_connect($serverName, $username, $password, $database);
if($conn == false){
    die("Connection failed: " . $conn->connect_error);
}
else {
echo("Connection made");
}
//ob_end_clean();