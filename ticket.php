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
        <a class="navbar-brand" href="index2.php">University of Houston Zoo</a>
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
                      <input type="date" class="form-control" name="visitdate">
                    </div>
                      <div class="col-md-6">
                        <label class="labels">Time of Visit</label>
                        <input type="time" class="form-control" name="visittime">
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email...">
                      </div>
                      <div class="col-md-12">
                        <label class="labels">How Old Are You?</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter age...">
                      </div>
                  </div>
                  <div class="mt-5">
                    <input class="btn btn-success" type="submit" name="reserveticket" value="Reserve Your Ticket">
                  </div>
              </div>
            </div>
            </form>
            <div class="col">
              <div class="d-flex flex-column p-3 py-5">
                <h2>Business Hours</h2>
                <p>Mon - Fri: 10AM - 7PM</p>
                <p>Saturday: 9AM - 8PM</p>
                <p>Sunday: CLOSED</p>
                <h2>Ticket Types</h2>
                <ul>
                  <li>Kid (5 - 12 years old): $10</li>
                  <li>Adult (13 - 49 years old): $15</li>
                  <li>Senior (50+ years old): $12</li>
                </ul>
                <img src="" alt="">
              </div>
          </div>
          </div>
    </body>
</html>