<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $serverName = "cosc3380-zoo.database.windows.net";
        $connectionOptions = array("Database"=>"UH_Zoo_Database",
            "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn){
            echo"Connection establsihed.<br />";
        }
        else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        ?>
    </head>

</html>