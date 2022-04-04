<?php

function OpenConnection()
    {
        $serverName = "tcp:myserver.database.windows.net,1433";
        $connectionOptions = array("Database"=>"UH_Zoo_Database",
            "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));

        return $conn;
    }
	
function ReadData()
    {
        try
        {
            $conn = OpenConnection();
            $tsql = "SELECT [species] FROM Animal";
            $getAnimals = sqlsrv_query($conn, $tsql);
            if ($getAnimals == FALSE)
                die(FormatErrors(sqlsrv_errors()));
            $animalCount = 0;
            while($row = sqlsrv_fetch_array($getAnimals, SQLSRV_FETCH_ASSOC))
            {
                echo($row['species']);
                echo("<br/>");
                $animalCount++;
            }
            sqlsrv_free_stmt($getAnimals);
            sqlsrv_close($conn);
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
    }
ReadData();
	
?>