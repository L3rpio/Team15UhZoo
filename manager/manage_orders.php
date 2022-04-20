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
                    <a class="nav-link" href="manager.php">Manager Portal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../EmployeePortal/Home.php">Employee Portal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_animals.php">Manage Animals</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="manage_orders.php">Manage Orders</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <?php 
         require_once 'process.php';
         
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
         
         ?>
      <div class="container-xl">
         <div class="table-responsive">
            <div class="table-wrapper">
               <div class="table-title">
                  <div class="row">
                     <div class="col-sm-6">
                        <h2>Orders</h2>
                     </div>
                  </div>
               </div>
               <table class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>Animal ID</th>
                        <th>Gender</th>
                        <th>Species</th>
                        <th>Enclosure Number</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                          $getOrdersSQL = "select * from orders where enclosure_num=$managerWorkPlaceID";
                          $getOrdersResult = mysqli_query($conn, $isFoodServiceSQL);
                          $isFoodService = mysqli_fetch_all($isFoodServiceResult, MYSQLI_ASSOC);
                          $foodServiceID;
                          if(count($isFoodService) === 0){
                            echo "hidden";
                          } else {
                            $foodServiceID = $isFoodService[0]['service_id'];
                          }
                          $getOrdersSQL = "select * from orders where served_by=$foodServiceID";
                          $getOrdersResult = mysqli_query($conn, $getOrdersSQL);
                          $orders = mysqli_fetch_all($getOrdersResult, MYSQLI_ASSOC);
                          mysqli_close($conn);
                        
                          foreach($orders as $order){
                            $orderID = $order['order_id'];
                            $orderCost = $order['cost'];
                            $itemName1 = $order['itemname1'];
                            $itemName2 = $order['itemname2'];
                            $itemName3 = $order['itemname3'];
                            $orderedBy = $order['ordered_by'];
                        ?>
                     <tr>
                        <?php 
                           echo "<td>$orderID</td>";
                           echo "<td>$orderCost</td>";
                           echo "<td>$itemName1</td>";
                           echo "<td>$itemName2</td>";
                           echo "<td>$itemName3</td>";
                           echo "<td>$orderedBy</td>";
                           }
                           ?>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
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
                     <div class="form-group hidden">
                        <label>Workplace ID</label>
                        <input type="number" name="workplaceID" class="form-control" value="<?php echo $managerWorkPlaceID ?>" required />
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
   </body>
</html>