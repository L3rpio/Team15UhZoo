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
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }

  // processing informatin to delete an employee
  if(isset($_POST['deleteemployee'])){
    $id = $_POST['id'];
    $run = mysqli_query($conn, "delete from employee where employee_id = $id");
    $_SESSION['message'] = 'Employee has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
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
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
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
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

  }

  // information processing for adding an expense to current work place
  if(isset($_POST['addexpense'])){
    $expenseMadeBy = $_POST['expenseMadeBy'];
    $expenseName = $_POST['expensename'];
    $expenseDescription = $_POST['expensedescription'];
    $expenseDate = $_POST['dateexpense'];
    $expenseAmt = $_POST['expenseamount'];
    $insertQuery = "insert into expense(
      expense_name, expense_descrip, date_expense_accrued, expense_amt, expense_madeby) 
      values('$expenseName', '$expenseDescription', '$expenseDate', $expenseAmt, $expenseMadeBy)";
    $run = mysqli_query($conn, $insertQuery);
    $_SESSION['message'] = 'Expense added!';
    $_SESSION['msg_type'] = 'success';
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }

  // information processing for updating an expense at work place
  if(isset($_POST['updateexpense'])){
    $expenseID = $_POST['expenseid'];
    $expenseName = $_POST['expensename'];
    $expenseDescription = $_POST['expensedescription'];
    $expenseAmount = $_POST['expenseamount'];
    $updateSQL = "update expense set
    expense_name = '$expenseName',
    expense_descrip = '$expenseDescription',
    expense_amt = $expenseAmount
    where expense_id = $expenseID";
    $run = mysqli_query($conn, $updateSQL);
    $_SESSION['message'] = 'Expense edited!';
    $_SESSION['msg_type'] = 'info';
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }


  // information processing for deleting expenses
  if(isset($_POST['deleteexpense'])){
    $id = $_POST['expenseid'];
    $run = mysqli_query($conn, "delete from expense where expense_id = $id");
    $_SESSION['message'] = 'Expense deleted!';
    $_SESSION['msg_type'] = 'danger';
    $URL="manager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
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
    $URL="manage_animals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  
  // information processing for deleting an animal
  if(isset($_POST['deleteAnimal'])){
    $id = $_POST['animalId'];
    $run = mysqli_query($conn, "delete from animal where animal_id = $id");
    $_SESSION['message'] = 'Animal has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    $URL="manage_animals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
?>
