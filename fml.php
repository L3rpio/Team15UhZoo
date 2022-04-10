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
    hi there 9 <br>
    <?php
      //OpenConnection();
       $conn = OpenConnection();
       $tsql = "SELECT * FROM dbo.Customer;";
       $getProducts = sqlsrv_query($conn, $tsql);
       echo("were not retrieving the table idk why fml");
       //$resultCheck=mysqli_num_rows($getProducts);
       //$row = mysqli_fetch_assoc($result);
       //echo $row['Customer_First_Name'] . "<br>";
       //if ($resultCheck > 0){
         //echo("entered the if statement");
        // while ($row = mysqli_fetch_assoc($result)){
          // echo $row['Customer_First_Name'] . "<br>";
        //}
       }
      ?>
    
    howdy changed commented while loop and if <br>
  </body>
</html>
