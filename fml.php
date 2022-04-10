<!DOCTYPE html>
<?php
  function OpenConnection()
  {
      $serverName = "uh-zoo-db.mysql.database.azure.com";
      $username ="zooadmin";
      $password= "Ab!2Xui5efd3!L&";
      $conn = new mysqli($serverName, $username, $password);
      if($conn == false){
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected succesfully";
      return $conn;
  }
  OpenConnection();
  ?>
<html lang="en">
  <head>
    <title>testing queries</title>
  </head>
  <body>
    
    howdy <br>

  </body>
</html>
