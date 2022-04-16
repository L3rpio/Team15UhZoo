<?php
//This script logs you into the database



$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username = "zooadmin";
$password = "Lovec++123";
$database = "uh_zoo";

/*$serverName = "localhost";
$username = "root";
$password = "";
$database = "";*/


$conn = new mysqli($serverName, $username, $password, $database);
if($conn == false){
    die("Connection failed: " . $conn->connect_error);
}
/*else {
echo("Connection made");
}*/