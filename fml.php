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
      
      
      $sql = "SELECT * FROM Customer";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row[0]. "<br>";
          }
      } else {
        echo "0 results";
      }
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