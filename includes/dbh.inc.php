<?php



function OpenConnection(){
    $serverName = "cosc3380-zoo.database.windows.net";
    $connectionOptions = array("Database"=>"UH_Zoo_Database",
        "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false){
    die(FormatErrors(sqlsrv_errors()));
    } else {
    echo("Connection made");
    }
    return $conn;
}













