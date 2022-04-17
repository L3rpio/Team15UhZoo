<?php 

$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username ="zooadmin";
$password= "Lovec++123";
$conn = new mysqli($serverName, $username, $password,"uh_zoo");
if($conn == false){
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['reserveticket'])){
  echo  print_r($_POST, true);
  $visitDate = $_POST["visitdate"];
  $visitTime = $_POST["visittime"]; 
  $email = $_POST['email'];
  $age = $_POST['age'];
  if($age >= 5 && $age <= 12){
    $cost = 10;
  } else if($age >= 13 && $age <= 149){
    $cost = 15;
  } else {
    $cost = 12;
  }
  $reserveTicketQuery = "insert into ticket 
  (date_of_purchase, date_of_visit, cost, bought_by, visit_time) 
  values('$visitDate', CURDATE(), $cost, 1, '$visitTime');";  // change 1 to the customer id
  $run = mysqli_query($conn, $reserveTicketQuery);
  echo "ticket reserved";  // eventually redirect to customer portal
}

mysqli_close($conn);
?>