<?php 
// if(isset($_POST['submit'])){
//   $firstname = $_POST['firstname'];
//   $lastname = $_POST['lastname'];
//   $email = $_POST['email'];
//   $addr = $_POST['address'];
//   $wage = $_POST['hourlywage'];
//   $hoursworked = $_POST['hoursworked'];

//   echo $firstname;
// }

$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username ="zooadmin";
$password= "Lovec++123";
$conn = new mysqli($serverName, $username, $password,"uh_zoo");
if($conn == false){
  die("Connection failed: " . $conn->connect_error);
}

session_start();

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $run = mysqli_query($conn, "delete from employee where employee_id = $id");
  $_SESSION['message'] = 'Employee has been deleted!';
  $_SESSION['msg_type'] = 'danger';
  header('location: manager.php');

}

if(isset($_POST['addemployee'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $addr = $_POST['address'];
  $wage = $_POST['hourlywage'];

  $insertQuery = "insert into employee(employee_first_name, employee_last_name, employee_Address, employee_email, hourly_wage, workplace_id) values('$firstname', '$lastname', '$addr', '$email', $wage, 5)";
  $run = mysqli_query($conn, $insertQuery);
  $_SESSION['message'] = 'Employee added!';
  $_SESSION['msg_type'] = 'success';
  header('location: manager.php');

}

if(isset($_POST['updateemployee'])){
  $id = $_POST['id'];
  $wage = $_POST['hourlywage'];
  $hoursWorked = $_POST['hoursworked'];
  $updateQuery = "update employee set hourly_wage=$wage, hours_worked=$hoursWorked where employee_id = $id";
  $run = mysqli_query($conn, $updateQuery);
  $_SESSION['message'] = 'Employee updated!';
  $_SESSION['msg_type'] = 'success';
  header('location: manager.php');

}
mysqli_close($conn);
?>