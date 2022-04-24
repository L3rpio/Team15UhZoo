<?php 
   $serverName = "zoodbteam15-server.mysql.database.azure.com";
   $username ="zooadmin";
   $password= "Lovec++123";
   $conn = new mysqli($serverName, $username, $password,"uh_zoo");
   if($conn == false){
     die("Connection failed: " . $conn->connect_error);
   }
   
   session_start();
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
                     <a class="nav-link active" href="">Admin Portal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="../reports/customer_report.php">Customer Report</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="../reports/employee_reports.php">Employee Report</a>
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
      
      <!-- html code to display table about customer -->
      <div class="container-xl">
         <div class="table-responsive">
            <div class="table-wrapper">
               <div class="table-title">
                  <div class="row">
                     <div class="col-sm-6">
                        <h2>Manage Customers</h2>
                     </div>
                  </div>
               </div>
               <table class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Joined</th>
                        <th>Email</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $sql = "select * from customer";
                        $result = mysqli_query($conn, $sql);
                        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($customers as $customer){
                        ?>
                     <tr>
                        <?php 
                           $customerID  = $customer["customer_id"];
                           $firstName = $customer["first_name"];
                           $lastName = $customer["last_name"];
                           $date = $customer["date_added"];
                           $email = $customer["email"];
                           echo "<td>" . $customerID . "</td>";
                           echo "<td>" . $firstName . "</td>";
                           echo "<td>" . $lastName . "</td>";
                           echo "<td>" . $date . "</td>";
                           echo "<td>$email</td>";
                           ?>
                        <td>
                           <a class="edit" href="#editCustomer<?php echo $customerID; ?>" class="btn btn-info" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                           </a>
                           <a class="delete" href="#deleteCustomer<?php echo $customerID; ?>" class="btn btn-danger light-link" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                           </a>

                        </td>
                     </tr>
                     <div id="editCustomer<?php echo $customerID; ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action="admin_process.php" method="post">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Edit Customer</h4>
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
                                       <input type="number" name="id" value="<?php echo $customerID; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>First Name</label>
                                       <input type="text" name="firstname" value="<?php echo $firstName; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" name="lastname" value="<?php echo $lastName; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Date Joined</label>
                                       <input type="text" name="dateJoined" value="<?php echo $date; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" required />
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <input
                                       type="button"
                                       class="btn btn-default"
                                       data-dismiss="modal"
                                       value="Cancel"
                                       />
                                    <input type="submit" name="updateCustomer" class="btn btn-info" value="Save" />
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- Delete Modal HTML -->
                     <div id="deleteCustomer<?php echo $customerID; ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action="admin_process.php" method="post">
                                 <input type="number" name="id" value="<?php echo $customerID; ?>" class="form-control" required hidden/>
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
                                    <p>Are you sure you want to delete this customer?</p>
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
                                    <input type="submit" name="deleteCustomer" class="btn btn-danger" value="Delete" />
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
                        <th>Work Days</th>
                        <th>Pay Status</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $sql = "select * from employee";
                        $result = mysqli_query($conn, $sql);
                        $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($employees as $employee){
                        ?>
                     <tr>
                        <?php 
                           $employeeID  = $employee["employee_id"];
                           $employeeFirstName = $employee["employee_first_name"];
                           $employeeLastName = $employee["employee_last_name"];
                           $employeeAddr = $employee["employee_Address"];
                           $employeeEmail = $employee["employee_email"];
                           $wage = $employee["hourly_wage"];
                           $paycheck = $employee["paycheck"];
                           $hoursWorked = $employee["hours_worked"];
                           $workDays = $employee['work_days'];
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
                           echo "<td>$workDays</td>";
                           if($payStatus == 0 || $payStatus === NULL){
                             echo "<td class='badge bg-danger'>Unpaid</td>";
                           } else if($payStatus == 1){
                             echo "<td class='badge bg-success'>Paid</td>";
                           } else if($payStatus == 2){
                             echo "<td class='badge bg-warning text-dark'>Payment Pending</td>";
                           }
                           
                           ?>
                        <td>
                           <!-- <a href="manager.php?edit=" class="btn btn-info">Edit</a> -->
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
                              <form action="admin_process.php" method="post">
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
                                       <label>First Name</label>
                                       <input type="text" name="firstname" value="<?php echo $employeeFirstName; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" name="lastname" value="<?php echo $employeeLastName; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" name="email" value="<?php echo $employeeEmail; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Address</label>
                                       <input type="text" name="address" value="<?php echo $employeeAddr; ?>" class="form-control" required />
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
                                    <div class="form-group">
                                       <label>Work Days</label>
                                       <input type="text" name="workDays" value="<?php echo $workDays; ?>" class="form-control" required />
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
                              <form action="admin_process.php" method="post">
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

      <div class="container-xl">
         <div class="table-responsive">
            <div class="table-wrapper">
               <div class="table-title">
                  <div class="row">
                     <div class="col-sm-6">
                        <h2>Manage Work Places</h2>
                     </div>
                     <div class="col-sm-6">
                        <a
                           href="#addWPModal"
                           class="btn btn-success"
                           data-toggle="modal"
                           ><i class="material-icons">&#xE147;</i>
                        <span>Add New Work Place</span></a>
                     </div>
                  </div>
               </div>
               <table class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Work Place Name</th>
                        <th>Manager ID</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $sql = "select * from workplace";
                        $result = mysqli_query($conn, $sql);
                        $workplaces = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($workplaces as $workplace){
                        ?>
                     <tr>
                        <?php 
                           $wpID  = $workplace["workplace_id"];
                           $wpName = $workplace["workplace_name"];
                           $mID = $workplace["manager_id"];
                           echo "<td>" . $wpID . "</td>";
                           echo "<td>" . $wpName . "</td>";
                           echo "<td>" . $mID . "</td>";
                           ?>
                        <td>
                           <a class="edit" href="#editWP<?php echo $wpID; ?>" class="btn btn-info" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                           </a>
                           <a class="delete" href="#deleteWP<?php echo $wpID; ?>" class="btn btn-danger light-link" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                           </a>
                        </td>
                     </tr>
                     <div id="editWP<?php echo $wpID; ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action="admin_process.php" method="post">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Edit Work Place</h4>
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
                                       <input type="number" name="id" value="<?php echo $wpID; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Work Place Name</label>
                                       <input type="text" name="wpName" value="<?php echo $wpName; ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                       <label>Manager ID</label>
                                       <input type="text" name="mID" value="<?php echo $mID; ?>" class="form-control" required />
                                    </div>
                                 <div class="modal-footer">
                                    <input
                                       type="button"
                                       class="btn btn-default"
                                       data-dismiss="modal"
                                       value="Cancel"
                                       />
                                    <input type="submit" name="updateWP" class="btn btn-info" value="Save" />
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>

                     <div id="deleteWP<?php echo $wpID; ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action="admin_process.php" method="post">
                                 <input type="number" name="id" value="<?php echo $wpID; ?>" class="form-control" required hidden/>
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Work Place</h4>
                                    <button
                                       type="button"
                                       class="close"
                                       data-dismiss="modal"
                                       aria-hidden="true">
                                    &times;
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <p>Are you sure you want to delete this work place?</p>
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
                                    <input type="submit" name="deleteWP" class="btn btn-danger" value="Delete" />
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
      
      <!-- Add new entry modals -->
      <div id="addEmployeeModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <form action="admin_process.php" method="post">
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
                        <label>Workplace ID</label>
                        <input type="number" name="workplaceID" class="form-control" required />
                     </div>
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

      <div id="addWPModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <form action="admin_process.php" method="post">
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
                        <label>Work Place Name</label>
                        <input type="text" name="name" class="form-control" required />
                     </div>
                     <div class="form-group">
                        <label>Manager ID</label>
                        <input type="number" name="id" class="form-control" required />
                     </div>
                     <div class="form-group">
                        <label>Work Place Type</label>
                        <select name="type" class="form-select" required>
                          <option value="enclosure" selected>Enclosure</option>
                          <option value="food" selected>Food Service</option>
                        </select>
                     </div>
                  <div class="modal-footer">
                     <input
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                        value="Cancel"
                        />
                     <input type="submit" name="addWP" class="btn btn-success" value="Add" />
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>