<?php 
$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username ="zooadmin";
$password= "Lovec++123";
$conn = new mysqli($serverName, $username, $password,"uh_zoo");
if($conn == false){
  die("Connection failed: " . $conn->connect_error);
}

session_start();
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
         />
      <title>UH Zoo Manager Portal</title>
      <link
         rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"
         />
      <link
         rel="stylesheet"
         href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
         />
      <link
         rel="stylesheet"
         href="https://fonts.googleapis.com/icon?family=Material+Icons"
         />
      <link
         rel="stylesheet"
         href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
         />
      <link rel="stylesheet" href="../css/managercrud.css" />
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   </head>
   <body>

   <!-- html code for manager nav bar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container px-5">
            <a class="navbar-brand" href="../index.php">University of Houston Zoo</a>
            <button
               class="navbar-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="manager.php">Manager Portal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="Home.php">Employee Portal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="manage_animals.php">Manage Animals</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="manage_orders.php">Manage Orders</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      <!-- php code for starting the session and getting a message when the manager updates, deletes, or adds information to a table -->
      <?php 
         session_start();
         // see if SESSION variable for 'message' is set 
         if(isset($_SESSION['message'])): 
         ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
         <?php 
         // if SESSION variable for 'message' is set then print it out near the top of the viewport
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
      </div>
      <?php endif ?>

      <!-- PHP code for getting information about the manager of this work place -->
      <?php 
        $managerID = $_SESSION['user_id'];
        $getManagerSQL = "select * from employee where employee_id=$managerID";
        $managerResult = mysqli_query($conn, $getManagerSQL);
        $manager = mysqli_fetch_all($managerResult, MYSQLI_ASSOC);
        $managerFirstName = $manager[0]["employee_first_name"];
        $managerLasttName = $manager[0]["employee_last_name"];
        $managerAddr = $manager[0]["employee_Address"];
        $managerEmail = $manager[0]["employee_email"];
        $managerWage = $manager[0]["hourly_wage"];
        $managerWorkPlaceID = $manager[0]["workplace_id"];
        $managerHoursWorked = $manager[0]["hours_worked"];
        $profilePicture =$manager[0]['image'];
        
        $getWorkPlaceName = "select * from workplace where workplace_id=$managerWorkPlaceID";
        $workPlace = mysqli_query($conn, $getWorkPlaceName);
        $workPlaceResult = mysqli_fetch_all($workPlace, MYSQLI_ASSOC);
        $workPlaceName = $workPlaceResult[0]['workplace_name'];
      ?>

      <!-- html code for displaying the manager profile and the ability to update information -->
      <div class="container rounded bg-white mt-5 mb-5">
      <form action="process.php" method="post">
         <div class="row">
         <div class="col border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
               <img class='rounded-circle mt-5' width='250px' alt='profilepicture' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
            </div>
         </div>
         <div class="col border-right">
            <div class="p-3 py-5">
               <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Manager Profile</h4>
               </div>
               <div class="row mt-2">
                  <div class="col-md-12">
                     <label class="labels">ID</label>
                     <input type="text" class="form-control" name="id" value="<?php echo $managerID; ?>" readonly>
                  </div>
                  <div class="col-md-6">
                     <label class="labels">First Name</label>
                     <input type="text" class="form-control" name="firstname" value="<?php echo $managerFirstName; ?>">
                  </div>
                  <div class="col-md-6">
                     <label class="labels">Last Name</label>
                     <input type="text" class="form-control" name="lastname" value="<?php echo $managerLasttName; ?>">
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-md-12">
                     <label class="labels">Address</label>
                     <input type="text" class="form-control" name="address" value="<?php echo $managerAddr; ?>">
                  </div>
                  <div class="col-md-12">
                     <label class="labels">Email</label>
                     <input type="text" class="form-control" name="email" value="<?php echo $managerEmail; ?>">
                  </div>
                  <div class="col-md-12">
                     <label class="labels">Hourly Wage</label>
                     <input type="number" class="form-control" name="wage" value="<?php echo $managerWage; ?>" readonly>
                  </div>
                  <div class="col-md-12">
                     <label class="labels">Hours Worked</label>
                     <input type="number" class="form-control" name="hoursworked" value="<?php echo ($managerHoursWorked == 0 || $managerHoursWorked == NULL) ? 0: $managerHoursWorked; ?>">
                  </div>
                  <div class="col-md-12">
                     <label class="labels">Work Place</label>
                     <input type="text" class="form-control" value="<?php echo $workPlaceName ?>" readonly>
                  </div>
               </div>
               <div class="mt-5 text-center">
                  <input class="btn btn-success" type="submit" name="savemanagerprofile" value="Save Profile">
               </div>
            </div>
      </form>
      </div>



   </body>
</html>



<!-- This section is to process all the forms on the manager page -->
<?php
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
    $_SESSION['message'] = 'Manager Updated';
    $_SESSION['msg_type'] = 'info';
    header('location: manager.php');
  }

  // processing informatin to delete an employee
  if(isset($_POST['deleteemployee'])){
    $id = $_POST['id'];
    $run = mysqli_query($conn, "delete from employee where employee_id = $id");
    $_SESSION['message'] = 'Employee has been deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: manager.php');
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
    header('location: manager.php');
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

    $updateQuery = "update employee set 
    employee_first_name='$fname',
    employee_last_name='$lname',
    employee_Address='$addr',
    employee_email='$email', 
    hourly_wage=$wage, 
    hours_worked=$hoursWorked, 
    paid_status=$payStatus
    where employee_id = $id;";
    $run = mysqli_query($conn, $updateQuery);
    $_SESSION['message'] = 'Employee updated!';
    $_SESSION['msg_type'] = 'warning';
    header('location: manager.php');

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
    header('location: manager.php');
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
    header('location: manager.php');
  }


  // information processing for deleting expenses
  if(isset($_POST['deleteexpense'])){
    $id = $_POST['expenseid'];
    $run = mysqli_query($conn, "delete from expense where expense_id = $id");
    $_SESSION['message'] = 'Expense deleted!';
    $_SESSION['msg_type'] = 'danger';
    header('location: manager.php');
  }
?>
