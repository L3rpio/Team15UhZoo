<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Admin Portal</title>
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
    <link rel="stylesheet" href="../css/admincrud.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../js/admincrud.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container px-5">
        <a class="navbar-brand" href="../index.php">University of Houston Zoo</a>
        <a class="navbar-brand" href="../reports/customer_report.php">Customer Reports</a>
        <a class="navbar-brand" href="../reports/employee_reports.hp">Employee Reports</a>
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
          <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#!">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#contact-us">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Customer Portal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Employee Portal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/admin.php">Manager Portal</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>
    <?php 
      require_once 'admin_process.php';

      if(isset($_SESSION['message'])): 
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php 
         echo $_SESSION['message'];
         unset($_SESSION['message']);
      ?>
      </div>
       <?php endif ?>
    
    <?php 
      $serverName = "zoodbteam15-server.mysql.database.azure.com";
      $username ="zooadmin";
      $password= "Lovec++123";
      $conn = new mysqli($serverName, $username, $password,"uh_zoo");
      if($conn == false){
        die("Connection failed: " . $conn->connect_error);
      }

      $AdminID = $_SESSION['user_id'];
      $getAdminSQL = "select * from employee where employee_id = $AdminID";
      $adminResult = mysqli_query($conn, $getAdminSQL);
      $admin = mysqli_fetch_all($adminResult, MYSQLI_ASSOC);
      $adminFirstName = $admin[0]["employee_first_name"];
      $adminLasttName = $admin[0]["employee_last_name"];
      $adminAddr = $admin[0]["employee_Address"];
      $adminEmail = $admin[0]["employee_email"];
      $adminWage = $admin[0]["hourly_wage"];
      $adminWorkPlaceID = $admin[0]["workplace_id"];
      $adminHoursWorked = $admin[0]["hours_worked"];
      $profilePicture =$admin[0]['image'];

      $getWorkPlaceName = "select * from workplace where workplace_id=$adminWorkPlaceID";
      $workPlace = mysqli_query($conn, $getWorkPlaceName);
      $workPlaceResult = mysqli_fetch_all($workPlace, MYSQLI_ASSOC);
      $workPlaceName = $workPlaceResult[0]['workplace_name'];

    ?>

<!--     <div class="container rounded bg-white mt-5 mb-5">
      <form action="admin_process.php" method="post">
      <div class="row">
          <div class="col border-right">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <!-- fix me
                   <?php 
                  // if($profilePicture === NULL){
                  //   echo "<img class='rounded-circle mt-5' width='250px' alt='profilepicture' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>";
                  // } else {
                  //   echo "<img class='rounded-circle mt-5' width='250px' alt='profilepicture' src='$profilePicture'>";
                  // }
                ?> 
                
                <img class='rounded-circle mt-5' width='250px' alt='profilepicture' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                <input type="file" name="profilepicture">
              </div> -->
<!--           </div>
          <div class="col border-right">
            
              <div class="p-3 py-5">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="text-right">Admin Profile</h4>
                  </div>
                  <div class="row mt-2">
                      <div class="col-md-12">
                        <label class="labels">ID</label>
                        <input type="text" class="form-control" name="id" value="<?php //echo $adminID; ?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php //echo $adminFirstName; ?>">
                      </div>
                      <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php //echo $adminLasttName; ?>">
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php //echo $adminAddr; ?>">
                      </div>
                      <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php //echo $adminEmail; ?>">
                      </div>
                      <div class="col-md-12">
                        <label class="labels">Hourly Wage</label>
                        <input type="number" class="form-control" name="wage" value="<?php //echo $adminWage; ?>" readonly>
                      </div>
                      <div class="col-md-12">
                        <label class="labels">Hours Worked</label>
                        <input type="number" class="form-control" name="hoursworked" value="<?php //echo ($adminHoursWorked == 0 || $adminHoursWorked == NULL) ? 0: $adminHoursWorked; ?>">
                      </div>
                      <div class="col-md-12">
                        <label class="labels">Work Place</label>
                        <input type="text" class="form-control" value="<?php //echo $workPlaceName ?>" readonly>
                      </div>
                  </div>
                  <div class="mt-5 text-center">
                    <input class="btn btn-success" type="submit" name="saveadminprofile" value="Save Profile">
                  </div>
              </div>
            </form>
          </div> -->
      </div>
    </div>
    
    
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Manage Employees</h2>
              </div>
              <div class="col-sm-6">
                <a
                  href="#addEmployeeModal"
                  class="btn btn-success"
                  data-toggle="modal"
                  ><i class="material-icons">&#xE147;</i>
                  <span>Add New Employee</span></a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Hourly Wage</th>
                <th>Hours Worked</th>
                <th>Pay Check</th>
                <th>Pay Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $sql = "select * from employee where workplace_id=$adminWorkPlaceID";
              $result = mysqli_query($conn, $sql);
              $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
              mysqli_close($conn);
              $expenses = [];
              foreach ($employees as $employee){
            ?>
              <tr>
                <?php 
                  $employeeID  = $employee["employee_id"];
                  if($employeeID == $adminID){
                    continue;
                  }
                  $employeeFirstName = $employee["employee_first_name"];
                  $employeeLastName = $employee["employee_last_name"];
                  $employeeAddr = $employee["employee_Address"];
                  $employeeEmail = $employee["employee_email"];
                  $wage = $employee["hourly_wage"];
                  $paycheck = $employee["paycheck"];
                  $hoursWorked = $employee["hours_worked"];

                  $expenses[] = $paycheck * $hoursWorked;

                  if($hoursWorked === NULL){
                    $hoursWorked = 0;
                  }
                  $payStatus = $employee["paid_status"];
                  echo "<td>" . $employeeID . "</td>";
                  echo "<td>" . $employeeFirstName . " " . $employeeLastName . "</td>";
                  echo "<td>" . $employeeEmail . "</td>";
                  echo "<td>" . $employeeAddr . "</td>";
                  echo "<td>$$wage</td>";
                  echo "<td>" . $hoursWorked . "</td>";
                  if($paycheck === NULL || $paycheck === 0){
                    echo "<td>$0</td>";
                  } else {
                    echo "<td>$" . $paycheck . "</td>";
                  }

                  if($payStatus == 0 || $payStatus === NULL){
                    echo "<td class='badge bg-danger'>Unpaid</td>";
                  } else if($payStatus == 1){
                    echo "<td class='badge bg-success'>Paid</td>";
                  } else if($payStatus == 2){
                    echo "<td class='badge bg-warning text-dark'>Payment Pending</td>";
                  }
                  
                ?>
                <td>
                  <!-- <a href="admin.php?edit=" class="btn btn-info">Edit</a> -->
                  <a class="edit" href="#editEmployee<?php echo $employeeID; ?>" class="btn btn-info" data-toggle="modal">
                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                  </a>
                  <a class="delete" href="#deleteEmployee<?php echo $employeeID; ?>" class="btn btn-danger light-link" data-toggle="modal">
                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                  </a>
                </td>
              </tr>
              <div id="editEmployee<?php echo $employeeID; ?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="process.php" method="post">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Employee</h4>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true"
                              >
                                &times;
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="form-group hidden">
                                <label>ID</label>
                                <input type="number" name="id" value="<?php echo $employeeID; ?>" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label>Hourly Wage</label>
                                <input type="text" name="hourlywage" value="<?php echo $wage; ?>" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label>Hours Worked</label>
                                <input type="text" name="hoursworked" value="<?php echo $hoursWorked; ?>" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label>Pay Status</label>
                                <select name="paystatus" class="form-select" required>
                                  <option selected value = 0>Unpaid</option>
                                  <option value=2>Pending</option>
                                  <option value=1>Paid</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input
                                type="button"
                                class="btn btn-default"
                                data-dismiss="modal"
                                value="Cancel"
                              />
                              <input type="submit" name="updateemployee" class="btn btn-info" value="Save" />
                            </div>
                          </form>
                        </div>
                      </div>
                  </div>
                    <!-- Delete Modal HTML -->
                    <div id="deleteEmployee<?php echo $employeeID; ?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="process.php" method="post">
                          <input type="number" name="id" value="<?php echo $employeeID; ?>" class="form-control" required hidden/>
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Employee</h4>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true">
                                &times;
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete this employee?</p>
                              <p class="text-warning">
                                <small>This action cannot be undone.</small>
                              </p>
                            </div>
                            <div class="modal-footer">
                              <input
                                type="button"
                                class="btn btn-default"
                                data-dismiss="modal"
                                value="Cancel"
                              />
                              <input type="submit" name="deleteemployee" class="btn btn-danger" value="Delete" />
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>

    
    <div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Customer Account</b></h2>
						</div>
						<a href="#addCustomerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a>
						<!--           <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>	 -->
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>User name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$serverName = "zoodbteam15-server.mysql.database.azure.com";
						$username = "zooadmin";
						$password = "Lovec++123";

						// $serverName = "localhost";
						// $username   = "root";
						// $password   = "";

						$conn = new mysqli($serverName, $username, $password, "uh_zoo");
						if ($conn == false) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql    = "SELECT * FROM Customer";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["user_name"] . "</td>";
								echo '<td> <a href="#editCustomerModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> ' . " " . '<a href="admin2customer.php?delete=' . $row["customer_id"] . '" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a><div id="editCustomerModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><form method="post"><div class="modal-header"><h4 class="modal-title">Edit Customer</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div><div class="modal-body"><div class="form-group"><label>First Name</label><input type="text" name="efirst" class="form-control" required value="' . $row['first_name'] . '"></div><div class="form-group"><label> Last Name</label><input type="text" name="elast" class="form-control" required value="' . $row['last_name'] . '"></div><div class="form-group"><label>User name</label><input type="text" name="eusername" class="form-control" required value="' . $row['user_name'] . '"></div><div class="form-group"><label>Email</label><input type="text" name="eemail" class="form-control" required value="' . $row['email'] . '"></div><div class="form-group"><label>Password</label><input type="text" name="epw" class="form-control" required value="' . base64_decode($row['pass_word']) . '"><input type="hidden" name="eid" class="form-control" value="' . $row['customer_id'] . '"></div></div><div class="modal-footer"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"><input type="submit" class="btn btn-info" value="Save"></div></form></div></div></div></td></tr>';
							}
						}
						// if($qry->rows > 0){
						//     while($reslt=mysqli_fetch_array($qry)){
						//     echo $reslt[0];
						//     }
						// }
						mysqli_close($conn);
						//die(mysqli_error($conn));
						?>
						<!--
												<td>Thomas Hardy</td>
												<td>thomashardy@mail.com</td>
												<td>(171) 555-2222</td>
												<td> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- ADD CUSTOMER Modal HTML -->
	< <div id="addCustomerModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post">
					<div class="modal-body">
						<div class="form-group">
							<label> First Name</label>
							<input type="text" name=first class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="last_name" name=last class="form-control" required>
						</div>
						<div class="form-group">
							<label>User name</label>
							<input type="user_name" name=user class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="pass_word" name=pw class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-success" value="Add"></button>
					</div>
				</form>
			</div>
		</div>
		</div>
		<!-- Edit Modal HTML -->
		<!-- <div id="editCustomerModal" class="modal fade">
				 <div class="modal-dialog">
						<div class="modal-content">
							 <form method="post">
									<div class="modal-header">
										 <h4 class="modal-title">Edit Customer</h4>
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										 <div class="form-group">
												<label>First Name</label>
												<input type="text" name="efirst" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label> Last Name</label>
												<input type="text" name="elast" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>User name</label>
												<input type="email" name="eemail" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Email</label>
												<input type="text" name="eemail" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Password</label>
												<input type="text" name="epw" class="form-control" required>
										 </div>
									</div>
									<div class="modal-footer">
										 <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
										 <input type="submit" class="btn btn-info" value="Save">
									</div>
							 </form>
						</div>
				 </div>
			</div> -->
</body>

</html>
<?php
//add to customer table
if (isset($_POST['first'])) {
	$first = $_POST['first'];
	$last  = $_POST['last'];
	$user  = $_POST['user'];
	$pw    = $_POST['pw'];

	$conn = new mysqli($serverName, $username, $password, "uh_zoo");
	if ($conn == false) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO Customer (first_name, last_name, user_name, pass_word) VALUES ('$first', '$last', '$user', '$pw')";
	if ($conn->query($sql) == true) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}

//edit customer table
if (isset($_POST['efirst'])) {
	$efirst    = $_POST['efirst'];
	$elast     = $_POST['elast'];
	$eusername = $_POST['eusername'];
	$eemail    = $_POST['eemail'];
	$epw       = base64_encode($_POST['epw']);
	$eid        = $_POST['eid'];

	$conn = new mysqli($serverName, $username, $password, "uh_zoo");
	if ($conn == false) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "UPDATE `customer` SET `first_name`='$efirst',`last_name`='$elast',`user_name`='$eusername',`email`='$eemail',`pass_word`='$epw' WHERE `customer_id`='$eid'";
	if ($conn->query($sql) == true) {
		$to_email  = $eemail;
		$mail_body = "Dear <b>" . $efirst . ' ' . $elast . "</b>,<br><br>You have updted your profile.<br><br><b>Team UH Zoo</b>";
		$subject   = "Registration";
		$mail_head = "Registration Email";
		$headers   = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: UH Zoo <no-reply@uhzoo.com>' . "\r\n";
		'Reply-To: ' . $eemail . '' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		$send_mail = mail($to_email, $subject, $mail_body, $headers);
		if ($send_mail) {
			echo "Record updated successfully!";
		} else {
			echo "Unable to send an email!";
		}
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}

//remove from customer table
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$conn = new mysqli($serverName, $username, $password, "uh_zoo");
	if ($conn == false) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DELETE FROM Customer WHERE customer_id = '$id'";
	if ($conn->query($sql) == true) {
		echo "Record deleted successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}

?>
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="process.php" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Add New Employee</h4>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-hidden="true"
              >
                &times;
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Hourly Wage</label>
                <input type="text" name="hourlywage" class="form-control" required />
              </div>
            </div>
            <div class="modal-footer">
              <input
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
                value="Cancel"
              />
              <input type="submit" name="addemployee" class="btn btn-success" value="Add" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
