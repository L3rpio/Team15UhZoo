<!DOCTYPE html>
<?php
  function OpenConnection()
  {
      $serverName = "cosc3380-zoo.database.windows.net";
      $connectionOptions = array("Database"=>"ZooDatabaseDump",
          "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
      $conn = sqlsrv_connect($serverName, $connectionOptions);
      if($conn == false){
        echo("Connection could not be established");
        die(FormatErrors(sqlsrv_errors()));
      }
      echo("Connection made if we made it at this point");
      return $conn;
  }
  ?>
<html lang="en">
  <head>
    <title>testing queries</title>
  </head>
  <body>
    hi there 5 <br>
    <?php
      //OpenConnection();
       $conn = OpenConnection();
       $tsql = "SELECT * FROM Customer;";
       $getProducts = sqlsrv_query($conn, $tsql); 
       $resultCheck=mysqli_num_rows($getProducts);
       if ($resultCheck > 0){
         echo("entered the if statement");
         while ($row = mysqli_fetch_assoc($result)){
           echo $row['Customer_First_Name'] . "<br>";
        }
       }
      ?>
    
    howdy changed database <br>
  </body>
</html>
