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
    <link rel="stylesheet" href="managercrud.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../js/managercrud.js"></script>
  </head>
  <body>
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
                <a
                  href="#deleteEmployeeModal"
                  class="btn btn-danger"
                  data-toggle="modal"
                  ><i class="material-icons">&#xE15C;</i> <span>Delete</span></a
                >
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll" />
                    <label for="selectAll"></label>
                  </span>
                </th>
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
              include_once "managercrud.php";
              foreach ($employees as $employee){
            ?>
              <tr>
                <td>
                  <span class="custom-checkbox">
                    <input
                      type="checkbox"
                      id="checkbox1"
                      name="options[]"
                      value="1"
                    />
                    <label for="checkbox1"></label>
                  </span>
                </td>
                <?php 
                  $employeeFirstName = $employee["employee_first_name"];
                  $employeeLastName = $employee["employee_last_name"];
                  $employeeAddr = $employee["employee_Address"];
                  $employeeEmail = $employee["employee_email"];
                  $wage = $employee["hourly_wage"];
                  $hoursWorked = $employee["hours_worked"];
                  echo "<td>" . $employeeFirstName . " " . $employeeLastName."<td>";
                  echo "<td>" . $employeeEmail . "</td>";
                  echo "<td>" . $employeeAddr . "</td>";
                  echo "<td>" . $wage . "</td>";
                  echo "<td>" . $hoursWorked . "</td>";
                ?>
                  <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                    ><i
                      class="material-icons"
                      data-toggle="tooltip"
                      title="Edit"
                      >&#xE254;</i
                    ></a
                  >
                  <a
                    href="#deleteEmployeeModal"
                    class="delete"
                    data-toggle="modal"
                    ><i
                      class="material-icons"
                      data-toggle="tooltip"
                      title="Delete"
                      >&#xE872;</i
                    ></a
                  >
                </td>
              </tr>
              <?php } ?>
              <tr>
                <td>
                  <span class="custom-checkbox">
                    <input
                      type="checkbox"
                      id="checkbox1"
                      name="options[]"
                      value="1"
                    />
                    <label for="checkbox1"></label>
                  </span>
                </td>
                <td>Thomas Hardy</td>
                <td>thomashardy@mail.com</td>
                <td>89 Chiaroscuro Rd, Portland, USA</td>
                <td>(171) 555-2222</td>
                <td>
                  <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                    ><i
                      class="material-icons"
                      data-toggle="tooltip"
                      title="Edit"
                      >&#xE254;</i
                    ></a
                  >
                  <a
                    href="#deleteEmployeeModal"
                    class="delete"
                    data-toggle="modal"
                    ><i
                      class="material-icons"
                      data-toggle="tooltip"
                      title="Delete"
                      >&#xE872;</i
                    ></a
                  >
                </td>
              </tr>
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
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Add Employee</h4>
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
                <label>Name</label>
                <input type="text" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Hourly Wage</label>
                <input type="number" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Hours Worked</label>
                <input type="number" class="form-control" required />
              </div>
            </div>
            <div class="modal-footer">
              <input
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
                value="Cancel"
              />
              <input type="submit" class="btn btn-success" value="Add" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
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
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Hourly Wage</label>
                <input type="text" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Hours Worked</label>
                <input type="text" class="form-control" required />
              </div>
            </div>
            <div class="modal-footer">
              <input
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
                value="Cancel"
              />
              <input type="submit" class="btn btn-info" value="Save" />
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
              <p>Are you sure you want to delete these employees?</p>
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
