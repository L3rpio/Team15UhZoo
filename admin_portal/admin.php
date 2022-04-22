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
	      <a class="navbar-brand" href="../index.php"><b>University of Houston Zoo</b></a>
        <a class="navbar-brand" href="../reports/customer_report.php">Customer Reports</a>
        <a class="navbar-brand" href="../reports/employee_reports.php">Employee Reports</a>
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
      session_start();
      print_r($_SESSION);
    ?>
  </body>
</html>
