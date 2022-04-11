<?php
ob_start();
$serverName = "zoodbteam15-server.mysql.database.azure.com";
$connectionOptions = array("Database"=>"uh_zoo",
    "Uid"=>"zooadmin", "PWD"=>"Lovec++123");
$conn = new mysqli($serverName, $connectionOptions);
if($conn == false){
    die("Connection failed: " . $conn->connect_error);
}
else {
echo("Connection made");
}
ob_end_clean();