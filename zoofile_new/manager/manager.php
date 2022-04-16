<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Employees at Workplace</title>
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
    <script src="../js/managercrud.js"></script>
  </head>
  <body>
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
                  <span>Add New Employee</span></a
                >
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $serverName = "zoodbteam15-server.mysql.database.azure.com";
              $username ="zooadmin";
              $password= "Lovec++123";
              $conn = new mysqli($serverName, $username, $password,"uh_zoo");
              if($conn == false){
                die("Connection failed: " . $conn->connect_error);
              }
           
              $sql = "select * from employee";
              $result = mysqli_query($conn, $sql);
              $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
              mysqli_close($conn);
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
                  $hoursWorked = $employee["hours_worked"];
                  echo "<td>" . $employeeID . "</td>";
                  echo "<td>" . $employeeFirstName . " " . $employeeLastName . "</td>";
                  echo "<td>" . $employeeEmail . "</td>";
                  echo "<td>" . $employeeAddr . "</td>";
                  echo "<td>$" . $wage . "</td>";
                  if($hoursWorked === NULL || $hoursWorked === 0){
                    echo "<td>0</td>";
                  } else {
                    echo "<td>" . $hoursWorked . "</td>";
                  }
                  
                ?>
                <td>
                  <!-- <a href="manager.php?edit=" class="btn btn-info">Edit</a> -->
                  <a class="edit" href="#editEmployee<?php echo $employeeID; ?>" class="btn btn-info" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                  <a class="delete"href="process.php?delete=<?php echo $employeeID; ?>"class="btn btn-danger light-link"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                  <!-- <a
                    href="#deleteEmployeeModal"
                    class="delete"
                    data-toggle="modal"
                    ><i
                      class="material-icons"
                      data-toggle="tooltip"
                      title="Delete"
                      >&#xE872;</i
                    ></a> -->
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
                                <input type="text" name="hourlywage" value="" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label>Hours Worked</label>
                                <input type="text" name="hoursworked" class="form-control" required />
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
              <?php } ?>
            </tbody>
          </table>
          <div class="clearfix">
            <!-- also not using total amount of entries -->
            <!-- <div class="hint-text">
              Showing <b>5</b> out of <b>25</b> entries
            </div> -->
            <!-- not using pagination for now -->
            <!-- <ul class="pagination">
              <li class="page-item disabled"><a href="#">Previous</a></li>
              <li class="page-item"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item active">
                <a href="#" class="page-link">3</a>
              </li>
              <li class="page-item"><a href="#" class="page-link">4</a></li>
              <li class="page-item"><a href="#" class="page-link">5</a></li>
              <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal HTML -->
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
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Delete Employee</h4>
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
              <input type="submit" class="btn btn-danger" value="Delete" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
