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
                    <a class="nav-link" href="/manager/manager.php">Manager Portal</a>
                  </li>
                  </ul> -->
            </div>
         </div>
      </nav>
      <h1>Hello world</h1>
      <div class="container-xl">
         <div class="table-responsive">
            <div class="table-wrapper">
               <div class="table-title">
                  <div class="row">
                     <div class="col-sm-6">
                        <h2>Manage Employees at <?php echo $workPlaceName; ?></h2>
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
                     <tr>
                        <td>
                           <!-- <a href="manager.php?edit=" class="btn btn-info">Edit</a> -->
                           <a class="edit" href="#editEmployee" class="btn btn-info" data-toggle="modal">
                           <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                           </a>
                           <a class="delete" href="#deleteEmployee" class="btn btn-danger light-link" data-toggle="modal">
                           <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                           </a>
                        </td>
                     </tr>

                  </tbody>
               </table>
            </div>
         </div>
      </div>
      
     
   </body>
</html>
