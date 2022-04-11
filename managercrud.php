<?php 
   $serverName = "zoodbteam15-server.mysql.database.azure.com";
   $username ="zooadmin";
   $password= "Lovec++123";
   $conn = new mysqli($serverName, $username, $password,"uh_zoo");
   if($conn == false){
     die("Connection failed: " . $conn->connect_error);
   }

   $sql = "select * from employee";
   $result = mysqli_query($conn, $sql);
   $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

   
   echo "hello there";

   mysqli_close($conn);
   die(mysqli_error($conn));
?>
