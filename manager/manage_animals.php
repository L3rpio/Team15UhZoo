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
                    <a class="nav-link active" aria-current="page" href="manage_animals.php">Manage Animals</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <?php 
         
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
                        <h2>Animals</h2>
                     </div>
                     <div class="col-sm-6">
                        <a
                           href="#addAnimalModal"
                           class="btn btn-success"
                           data-toggle="modal"
                           ><i class="material-icons">&#xE147;</i>
                        <span>Add New Animal</span></a>
                     </div>
                  </div>
               </div>
               <table class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>Animal ID</th>
                        <th>Gender</th>
                        <th>Species</th>
                        <th>Date Added to Zoo</th>
                        <th>Enclosure Number</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                          // $managerID = $_SESSION['user_id'];
                          $managerID = $_SESSION['user_id'];
                          $getWorkPlaceIDSQL = "select * from workplace where manager_id=$managerID;";
                          $getWorkPlaceResult = mysqli_query($conn, $getWorkPlaceIDSQL);
                          $getWorkPlace = mysqli_fetch_all($getWorkPlaceResult, MYSQLI_ASSOC);
                          $workPlaceID = $getWorkPlace[0]['workplace_id'];
                          $getEnclosureSQL = "select * from enclosure where work_id=$workPlaceID";
                          $getEnclosureResult = mysqli_query($conn, $getEnclosureSQL);
                          $enclosure = mysqli_fetch_all($getEnclosureResult, MYSQLI_ASSOC);
                          $enclosureNumber = $enclosure[0]['enclosure_id'];
                          $getAnimalsSQL = "select * from animal where enclosure_num=$enclosureNumber";
                          $getAnimalsResult = mysqli_query($conn, $getAnimalsSQL);
                          $animals = mysqli_fetch_all($getAnimalsResult, MYSQLI_ASSOC);
                          mysqli_close($conn);
                        
                          foreach($animals as $animal){
                            $animalID = $animal['animal_id'];
                            $gender = $animal['gender'];
                            $species = $animal['species'];
                            $date_added = $animal['date_added'];
                            $enclosureNumber = $animal['enclosure_num'];
                        ?>
                     <tr>
                        <?php 
                           echo "<td>$animalID</td>";
                           echo "<td>$gender</td>";
                           echo "<td>$species</td>";
                           echo "<td>$date_added</td>";
                           echo "<td>$enclosureNumber</td>";
                           ?>
                        <td>
                           <a class="delete" href="#deleteAnimal<?php echo $animalID; ?>" class="btn btn-danger light-link" data-toggle="modal">
                              <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                           </a>
                        </td>
                     </tr>
                     <div id="deleteAnimal<?php echo $animalID; ?>" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action="process.php" method="post">
                                 <input type="number" name="animalId" value="<?php echo $animalID; ?>" class="form-control" required hidden/>
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Animal</h4>
                                    <button
                                       type="button"
                                       class="close"
                                       data-dismiss="modal"
                                       aria-hidden="true">
                                    &times;
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <p>Are you sure you want to delete this animal?</p>
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
                                    <input type="submit" name="deleteAnimal" class="btn btn-danger" value="Delete" />
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
      <div id="addAnimalModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <form action="process.php" method="post">
                  <div class="modal-header">
                     <h4 class="modal-title">Add New Animal</h4>
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
                        <label>Enclosure Number</label>
                        <input type="number" name="enclosureNum" value="<?php echo $enclosureNumber; ?>" class="form-control" required />
                     </div>
                     <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" required>
                           <option selected value='M'>Male</option>
                           <option value="F">Female</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Species</label>
                        <input type="text" name="species" class="form-control" required />
                     </div>
                  </div>
                  <div class="modal-footer">
                     <input
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                        value="Cancel"
                        />
                     <input type="submit" name="addAnimal" class="btn btn-success" value="Add" />
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>