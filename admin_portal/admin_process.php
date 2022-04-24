<!-- This section is to process all the forms on the manager page -->
<?php
  ob_start();
  session_start();

  // connect to database
  $serverName = "zoodbteam15-server.mysql.database.azure.com";
  $username ="zooadmin";
  $password= "Lovec++123";
  $conn = new mysqli($serverName, $username, $password,"uh_zoo");
  if($conn == false){
    die("Connection failed: " . $conn->connect_error);
  }

  // information processing for editing and saving the manager profile
  if(isset($_POST['savemanagerprofile'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $addr = $_POST['address'];
    $email = $_POST['email'];
    $wage = $_POST['wage'];
    $hoursWorked = $_POST['hoursworked'];
    $updateManagerQuery = "update employee set 
    employee_first_name = '$firstname', 
    employee_last_name = '$lastname',
    employee_Address = '$addr',
    employee_email = '$email',
    hours_worked = $hoursWorked
    where employee_id = $id;";

    $run = mysqli_query($conn, $updateManagerQuery);
    echo "saving";
    $_SESSION['message'] = 'Manager Updated';
    $_SESSION['msg_type'] = 'info';
    header('location: admin_portal.php');
  }

  // processing informatin to delete an employee
  if(isset($_POST['deleteemployee'])){
    $id = $_POST['id'];
    $run = mysqli_query($conn, "delete from employee where employee_id = $id");
    $_SESSION['message'] = 'Employee has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: admin_portal.php');
  }

  // information processing for adding an employee
  if(isset($_POST['addemployee'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $addr = $_POST['address'];
    $wage = $_POST['hourlywage'];
    $workplaceID = $_POST['workplaceID'];

    $insertQuery = "insert into 
    employee(employee_first_name, employee_last_name, employee_Address, employee_email, hourly_wage, workplace_id) 
    values('$firstname', '$lastname', '$addr', '$email', $wage, $workplaceID)";
    $run = mysqli_query($conn, $insertQuery);
    $_SESSION['message'] = 'Employee added!';
    $_SESSION['msg_type'] = 'success';
    header('location: admin_portal.php');
  }

  // information processing for updating employees
  if(isset($_POST['updateemployee'])){
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $addr = $_POST['address'];
    $wage = $_POST['hourlywage'];
    $hoursWorked = $_POST['hoursworked'];
    $payStatus = $_POST['paystatus'];
    $workDays = $_POST['workDays'];

    $updateQuery = "update employee set 
    employee_first_name='$fname',
    employee_last_name='$lname',
    employee_Address='$addr',
    employee_email='$email', 
    hourly_wage=$wage, 
    hours_worked=$hoursWorked, 
    paid_status=$payStatus,
    work_days = '$workDays'
    where employee_id = $id;";
    $run = mysqli_query($conn, $updateQuery);
    $_SESSION['message'] = 'Employee updated!';
    $_SESSION['msg_type'] = 'warning';
    header('location: admin_portal.php');

  }

  // information processing for adding an animal
  if(isset($_POST['addAnimal'])){
    $enclosureNum = $_POST['enclosureNum'];
    $gender = $_POST['gender'];
    $species = $_POST['species'];
    $date = date('Y-m-d');
    $sql = "insert into animal(gender, species, enclosure_num, date_added) values('$gender', '$species', $enclosureNum, '$date')";
    $run = mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Animal added!';
    $_SESSION['msg_type'] = 'success';
    header('location: admin_portal.php');
  }
  
  // information processing for deleting an animal
  if(isset($_POST['deleteAnimal'])){
    $id = $_POST['animalId'];
    $run = mysqli_query($conn, "delete from animal where animal_id = $id");
    $_SESSION['message'] = 'Animal has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: admin_portal.php');
  }

  // information processing for customer
  if(isset($_POST['updateCustomer'])){
    $id = $_POST['id'];
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $date = $_POST['dateJoined'];
    $email = $_POST['email'];
    $sql = "update customer set
    first_name='$fn',
    last_name='$ln',
    date_added='$date',
    email='$email'
    where customer_id=$id";
    $run = mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Customer has been updated!';
    $_SESSION['msg_type'] = 'info';
    header('location: admin_portal.php');
  }

  if(isset($_POST['deleteCustomer'])){
    $id = $_POST['id'];
    $sql = "delete from customer where customer_id = $id";
    $run = mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Customer has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: admin_portal.php');
  }

  // information processing for work place
  if(isset($_POST['updateWP'])){
    $id = $_POST['id'];
    $name = $_POST['wpName'];
    $mID = $_POST['mID'];
    $sql = "update workplace set
    workplace_name='$name',
    manager_id=$mID where workplace_id=$id";
    $run = mysqli_query($conn, $sql);

    $sql = "select * from enclosure where work_id=$id";
    $run = mysqli_query($conn, $sql);
    if(mysqli_num_rows($run) > 0){
      $sql = "update enclosure set exhibit_name = '$name' where work_id=$id";
      $run = mysqli_query($conn, $sql);
    } else {
      $sql = "update food_service set name = '$name' where work_id=$id";
      $run = mysqli_query($conn, $sql);
    }
    $_SESSION['message'] = 'Work place has been updated!';
    $_SESSION['msg_type'] = 'info';
    header('location: admin_portal.php');
  }

  if(isset($_POST['addWP'])){
    $name = $_POST['name'];;
    $id = $_POST['id'];
    $type = $_POST['type'];

    $sql = "insert into workplace(workplace_name, manager_id) values('$name', $id)";
    $run = mysqli_query($conn, $sql);

    $sql = "select * from workplace where manager_id = $id";
    $run = mysqli_query($conn, $sql);
    $runResult = mysqli_fetch_all($run, MYSQLI_ASSOC);

    $workID = $runResult[0]['workplace_id'];

    $sql = "update employee set workplace_id = $workID where employee_id = $id";
    $run = mysqli_query($conn, $sql);

    if($type === 'enclosure'){
      $sql = "insert into enclosure(exhibit_name, species_kept, work_id) values('$name', 'none', $workID)";
      $run = mysqli_query($conn, $sql);
    } else {
      $sql = "insert into food_service(name, work_id) values('$name', $workID)";
      $run = mysqli_query($conn, $sql);
    }

    $_SESSION['message'] = 'Work place has been added!';
    $_SESSION['msg_type'] = 'success';
    header('location: admin_portal.php');
  }

  if(isset($_POST['deleteWP'])){
    $id = $_POST['id'];
    $mID = $_POST['manager'];

    $sql = "update employee set workplace_id = 5 where employee_id = $mID";
    $run = mysqli_query($conn, $sql);
    
    // check if the current work place being deleted is an enclosure
    $sql = "select * from enclosure where work_id = $id";
    $run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($run) > 0){
      $runResult = mysqli_fetch_all($run, MYSQLI_ASSOC);
      $enclosureID = $runResult[0]["enclosure_id"];
      $sql = "delete from enclosure where enclosure_id  = $enclosureID";
      $run = mysqli_query($conn, $run);
    } else {
      $sql = "select * from food_service where work_id = $id";
      $run = mysqli_query($conn, $sql);
      $runResult = mysqli_fetch_all($run, MYSQLI_ASSOC);
      $serviceID = $runResult[0]["service_id"];
      $sql = "delete from food_service where service_id = $serviceID";
      $run = mysqli_query($conn, $sql);
    }
    $sql = "delete from workplace where workplace_id=$id;";
    $run = mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Work place has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: admin_portal.php');
  }
?>
