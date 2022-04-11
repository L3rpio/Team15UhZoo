<?php
ob_start();
// $serverName = "cosc3380-zoo.database.windows.net";
// $dBUsername = "dhphan3";
// $dBPassword = "K7EY2kh@ri*oJH9";
// $dBName = "UH_Zoo_Database";
// $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
// if (!$conn){
//     die("Connection failed: ". mysqli_connect_error());
// }
// else{
//     echo("Connection made!");
// }


$serverName = "cosc3380-zoo.database.windows.net";
$connectionOptions = array("Database"=>"UH_Zoo_Database",
    "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn == false){
die(FormatErrors(sqlsrv_errors()));
} else {
echo("Connection made");
}
ob_end_clean();

// function OpenConnection(){
//     $serverName = "cosc3380-zoo.database.windows.net";
//     $connectionOptions = array("Database"=>"UH_Zoo_Database",
//         "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
//     $conn = sqlsrv_connect($serverName, $connectionOptions);
//     if($conn == false){
//     die(FormatErrors(sqlsrv_errors()));
//     } else {
//     echo("Connection made");
//     }
//     return $conn;
// }












