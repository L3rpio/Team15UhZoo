<?php
  function OpenConnection()
  {
      $serverName = "zoodbteam15-server.mysql.database.azure.com";
      $username ="zooadmin";
      $password= "Lovec++123";
      $conn = new mysqli($serverName, $username, $password,"uh_zoo");
      if($conn == false){
        die("Connection failed: " . $conn->connect_error);
      }
      
      //$result = $conn->query("SELECT DATABASE('uh_zoo)");
      //$row = $result->fetch_row();
      //echo $row[0];
      //mysql_select_db("uh_zoo", $conn);
      $sql="SELECT * FROM Customer";
      $qry = mysqli_query($conn,$sql);

      while($reslt=mysqli_fetch_array($qry)){
        echo $reslt["first_name"] . "<br />";
      }
      mysqli_close($conn);
      // if (mysqli_num_rows($result) > 0) {
      // // output data of each row
      //   while($row = mysqli_fetch_assoc($result)) {
      //     echo $row[0];
      //     }
      // } else {
      //   echo "0 results";
      // }
      die(mysqli_error($conn));
    }
	OpenConnection();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
</html>
