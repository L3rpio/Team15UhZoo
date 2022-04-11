<!DOCTYPE html>
<?php
  $serverName = "uh-zoo-db.mysql.database.azure.com";
  $username ="zooadmin";
  $password= "Ab!2Xui5efd3!L&";
  $db_name = 'uh_zoo';
  $conn = mysqli_connect($serverName, $username, $password, $db_name);
  $sql = "select * from customer";

  $query = $conn->query($sql);

  if($query->num_rows > 0){
    echo "success";
  } else {
    echo "0 results";
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testing Queries</title>
</head>
<body>
  <h1>Hello world. This is where we'll be testing our queries</h1>
  
</body>
</html>

