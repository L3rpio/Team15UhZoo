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
      <?php
         session_start(); 
         $serverName = "zoodbteam15-server.mysql.database.azure.com";
         $username ="zooadmin";
         $password= "Lovec++123";
         $conn = new mysqli($serverName, $username, $password,"uh_zoo");
         if($conn == false){
           die("Connection failed: " . $conn->connect_error);
         }
         $managerID = 1;
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
      <div class="container rounded bg-white mt-5 mb-5">
      <p><?php print_r($_SESSION) ?></p>
      <form action="" method="post">
         <div class="row">
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