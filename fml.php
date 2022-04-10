<!DOCTYPE html>
<?php
  function OpenConnection()
  {
      $serverName = "cosc3380-zoo.database.windows.net";
      $connectionOptions = array("Database"=>"UH_Zoo_Database",
          "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
      $conn = sqlsrv_connect($serverName, $connectionOptions);
      if($conn == false){
        die(FormatErrors(sqlsrv_errors()));
  echo("Connection could not be established");
      }
      return $conn;
  }
  ?>
<html lang="en">
  <head>
    <title>testing queries</title>
  </head>
  <body>
    hi there <br>
    <?php
      OpenConnection();
      $conn = OpenConnection();
      $tsql = "SELECT * FROM Customer;";
      $getProducts = sqlsrv_query($conn, $tsql); 
      $resultCheck=mysqli_num_rows($getProducts);
      if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
          echo $row[0] . "<br>";
        }
      }
      ?>
    
    howdy <br>
  </body>
</html>