<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>UH Zoo</title>
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
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
      </div>
    </nav>
    <div class="container rounded bg-white mt-5 mb-5">
      <form action="ticketProcessing.php" method="post">
      <div class="row">
          <div class="col border-right">
              <div class="p-3 py-5">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">Plan Your Visit</h2>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="labels">Date of Visit</label>
                      <input type="date" class="form-control" name="visitdate" required>
                    </div>
                      <div class="col-md-6">
                        <label class="labels">Time of Visit</label>
                        <input type="time" class="form-control" name="visittime" required>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email..." required>
                      </div>
                      <div class="col-md-12">
                        <label class="labels">How Old Are You?</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter age..." required>
                      </div>
                  </div>
                  <div class="mt-5">
                    <input class="btn btn-success" type="submit" name="reserveticket" value="Reserve Your Ticket">
                  </div>
                  <div class="mt-5">
                  <?php 
                    if(isset($_GET['error']) && $_GET['error'] === 'invaliddate'){
                      $currDate = date('Y-m-d');
                      echo "<div class='alert alert-danger'>Please enter a valid date. Today's Date is $currDate</div>";
                    } else if(isset($_GET['error']) && $_GET['error'] ==='invalidtime'){
                      echo "<div class='alert alert-danger'>Please enter a time when we are open</div>";
                    } else if(isset($_GET['error']) && $_GET['error'] ==='invalidemail'){
                      echo "<div class='alert alert-danger'>Please enter a valid email</div>";
                    } else if(isset($_GET['error']) && $_GET['error'] ==='invalidage'){
                      echo "<div class='alert alert-danger'>Please enter a valid age</div>";
                    } else if(isset($_GET['status']) && $_GET['status'] === 'reserved'){
                      echo "<div class='alert alert-success'>Your ticket has been reserved! We hope to see you soon!</div>";
                    }
                  ?>
                  </div>
              </div>
            </div>
            </form>
            <div class="col">
              <div class="d-flex flex-column p-3 py-5">
                <h2>Business Hours</h2>
                <p>Mon - Sat: 10AM - 7PM</p>
                <p>Sunday: CLOSED</p>
                <h2>Ticket Types</h2>
                <ul>
                  <li>Kid (5 - 12 years old): $10</li>
                  <li>Adult (13 - 49 years old): $15</li>
                  <li>Senior (50+ years old): $12</li>
                </ul>
                <h3>Tickets MUST be reserved at least 1 day in advance prior to the desired visit date</h3>
                <img src="" alt="">
              </div>
          </div>
          </div>
    </body>
</html>