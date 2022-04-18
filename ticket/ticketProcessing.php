<?php 

$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username ="zooadmin";
$password= "Lovec++123";
$conn = new mysqli($serverName, $username, $password,"uh_zoo");
if($conn == false){
  die("Connection failed: " . $conn->connect_error);
}

function validateDate($date){
  $year = intval(substr($date, 0, 4));
  $month = intval(substr($date, 5, 7));
  $day = intval(substr($date, 8));

  $currDate = date('Y-m-d');
  $currYear = intval(substr($currDate, 0, 4));
  $currMonth = intval(substr($currDate, 5, 7));
  $currDay = intval(substr($currDate, 8));

  if($year < $currYear || $month < $currMonth || $day <= $currDay){
    header("location: ticket.php?error=invaliddate");
    exit();
  }
}

function validateTime($time){
  $hour = substr($time, 0, 2);
  $minute = substr($time, 2);

  if($hour < 10 || $hour > 19){
     header("location: ticket.php?error=invalidtime");
    echo $hour;
    exit();
  }
}

function validateEmail($email){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location: ticket.php?error=invalidemail");
    exit();
  }
}

function validateAge($age){
  $age = intval($age);
  if($age < 0){
    header("location: ticket.php?error=invalidage");
    exit();
  }
}

if(isset($_POST['reserveticket'])){
  $visitDate = $_POST["visitdate"];
  $visitTime = $_POST["visittime"]; 
  $email = $_POST['email'];
  $age = $_POST['age'];
  // $user_id = $_SESSION['id'];

  validateDate($visitDate);
  validateTime($visitTime);
  validateEmail($email);
  validateAge($age);

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
  header('location: ticket.php?status=reserved');
}

mysqli_close($conn);
?>