<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
      
      $sql = "USE uh_zoo; SELECT * FROM Customer;";
      
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
  it finished <br>
  
</body>
</html>

