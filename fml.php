<?php
  function OpenConnection()
  {
      $serverName = "uh-zoo-db.mysql.database.azure.com";
      $username ="zooadmin";
      $password= "Ab!2Xui5efd3!L&";
      $conn = new mysqli($serverName, $username, $password,"uh_zoo");
      if($conn == false){
        die("Connection failed: " . $conn->connect_error);
      }
      
      //$result = $conn->query("SELECT DATABASE('uh_zoo)");
      //$row = $result->fetch_row();
      //echo $row[0];
      //mysql_select_db("uh_zoo", $conn);
      $sql="SELECT * FROM Customer";
      $result = mysqli_query($conn, $sql);
      $pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);
      while($rslt=mysqli_fetch_array($result)){
            echo $rslt["first_name"];
      }
      mysqli_free_result($result);
      mysqli_close($conn);
      print_r($pizzas);
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
  ?>

