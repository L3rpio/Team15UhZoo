<!-- 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
  </head>
  <body>
  </body>
</html>
 -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>UH Zoo</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container px-5">
        <a class="navbar-brand" href="#!">University of Houston Zoo</a>
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
              <a class="nav-link active" aria-current="page" href="#!">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#contact-us">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
      <div class="container px-5">
        Last changed 10:43pm apr11
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-6">
            <div class="text-center my-5">
              <h1 class="display-5 fw-bolder text-white mb-2">
                Welcome to the Zoo of the University of Houston
                <?php
                            ob_start();
                            session_start();
                            if(isset($_GET["msg"])){
                              if($_GET["msg"] == "loggedout"){
                                  echo "</br>";
                                  echo "</br>";
                                  echo "<p>Hello! You have logged out!</p>";
                                  echo "</br>";
                              }
                            }
                            if(isset($_GET["msg"])){
                              if($_GET["msg"] == "loggedin"){
                                  echo "</br>";
                                  echo "</br>";
                                  echo "<p>Hello! You have logged in!</p>";
                                  echo "</br>";
                              }
                            }
                            echo 'HelloS ' . htmlspecialchars($_SESSION['user_name']) . '!';
                            echo 'SESSION VarDump:' .var_dump($_SESSION);
                            if(isset($_SESSION['user_name'])){
                              echo "</br>";
                              echo "</br>";
                              echo "<p>Hello! You have logged in!</p>";
                              echo "Username: ";
                              echo $_SESSION['user_name'];
                              echo "</br>";
                              echo "First Name: ";
                              echo $_SESSION['first_name'];
                              echo "</br>";
                              echo "Last Name: ";
                              echo $_SESSION['last_name'];
                              echo "</br>";
                              echo "<a href='profile.php'>Profile Page</a>";
                              echo "</br>";
                              echo "<a href='includes/logout.inc.php'>Log Out</a>";
                            }
                            echo 'HelloC ' . htmlspecialchars($_COOKIE["id"]) . '!';
                            echo "</br>";
                            echo "</br>";
                            echo "</br>";
                            echo 'Cookie VarDump:' .var_dump($_COOKIE);
                            var_dump($_COOKIE);
                            if(isset($_COOKIE['id'])){
                              echo "Hello, from cookies!";

                              echo "</br>";
                              echo "<p>Hello! You have logged in!</p>";
                              echo "Username: ";
                              echo $_COOKIE['user_name'];
                              echo "</br>";
                              echo "First Name: ";
                              echo $_COOKIE['first_name'];
                              echo "</br>";
                              echo "Last Name: ";
                              echo $_COOKIE['last_name'];
                              echo "</br>";
                              echo "<a href='profile.php'>Profile Page</a>";
                              echo "</br>";
                              echo "<a href='includes/logout.inc.php'>Log Out</a>";
                            }
                            ob_flush();

                ?>
              </h1>
              <p class="lead text-white-50 mb-4">

                We are proud to annouce that we have offically opened up our zoo
                to the public. Sign up for an account with us to get tickets to
                visit us today!
              </p>


              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="GuestSignUp.php">Guest sign up</a>
                <a class="btn btn-outline-light btn-lg px-4" href="LoginPage.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
      <div class="container px-5 my-5">
        <div class="row gx-5">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div
              class="feature bg-primary bg-gradient text-white rounded-3 mb-3"
            >
              <i class="bi bi-collection"></i>
            </div>
            <h2 class="h4 fw-bolder">Exotic Animals</h2>
            <p>
              Here at the Zoo of UH, we have a wide array of animal exhibits for
              our customers to enjoy!
            </p>
            <!-- <a class="text-decoration-none" href="#!">
              Call to action
              <i class="bi bi-arrow-right"></i>
            </a> -->
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div
              class="feature bg-primary bg-gradient text-white rounded-3 mb-3"
            >
              <i class="bi bi-building"></i>
            </div>
            <h2 class="h4 fw-bolder">Delicious Cusine</h2>
            <p>
              In addition to our animal exhibits, we have also have loads of
              restaurants and food booths if you're feelihg hungry or thirsty
              during your visit, and if you're wondering, Shasta's Cones will be
              served at our zoo!
            </p>
            <!-- <a class="text-decoration-none" href="#!">
              Call to action
              <i class="bi bi-arrow-right"></i>
            </a> -->
          </div>
          <div class="col-lg-4">
            <div
              class="feature bg-primary bg-gradient text-white rounded-3 mb-3"
            >
              <i class="bi bi-toggles2"></i>
            </div>
            <h2 class="h4 fw-bolder">Home of the Cougars</h2>
            <p>
              However, it wouldn't be University of Houston Zoo without our
              cougars! Whose house? Coug's House! Come visit Shasta the cougar
              and his friends!
            </p>
            <!-- <a class="text-decoration-none" href="#!">
              Call to action
              <i class="bi bi-arrow-right"></i>
            </a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- Pricing section-->
    <!-- <section class="bg-light py-5 border-bottom">
      <div class="container px-5 my-5">
        <div class="text-center mb-5">
          <h2 class="fw-bolder">Pay as you grow</h2>
          <p class="lead mb-0">With our no hassle pricing plans</p>
        </div>
        <div class="row gx-5 justify-content-center">
          Pricing card free
          <div class="col-lg-6 col-xl-4">
            <div class="card mb-5 mb-xl-0">
              <div class="card-body p-5">
                <div class="small text-uppercase fw-bold text-muted">Free</div>
                <div class="mb-3">
                  <span class="display-4 fw-bold">$0</span>
                  <span class="text-muted">/ mo.</span>
                </div>
                <ul class="list-unstyled mb-4">
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    <strong>1 users</strong>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    5GB storage
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Unlimited public projects
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Community access
                  </li>
                  <li class="mb-2 text-muted">
                    <i class="bi bi-x"></i>
                    Unlimited private projects
                  </li>
                  <li class="mb-2 text-muted">
                    <i class="bi bi-x"></i>
                    Dedicated support
                  </li>
                  <li class="mb-2 text-muted">
                    <i class="bi bi-x"></i>
                    Free linked domain
                  </li>
                  <li class="text-muted">
                    <i class="bi bi-x"></i>
                    Monthly status reports
                  </li>
                </ul>
                <div class="d-grid">
                  <a class="btn btn-outline-primary" href="#!">Choose plan</a>
                </div>
              </div>
            </div>
          </div>
          Pricing card pro
          <div class="col-lg-6 col-xl-4">
            <div class="card mb-5 mb-xl-0">
              <div class="card-body p-5">
                <div class="small text-uppercase fw-bold">
                  <i class="bi bi-star-fill text-warning"></i>
                  Pro
                </div>
                <div class="mb-3">
                  <span class="display-4 fw-bold">$9</span>
                  <span class="text-muted">/ mo.</span>
                </div>
                <ul class="list-unstyled mb-4">
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    <strong>5 users</strong>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    5GB storage
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Unlimited public projects
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Community access
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Unlimited private projects
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Dedicated support
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Free linked domain
                  </li>
                  <li class="text-muted">
                    <i class="bi bi-x"></i>
                    Monthly status reports
                  </li>
                </ul>
                <div class="d-grid">
                  <a class="btn btn-primary" href="#!">Choose plan</a>
                </div>
              </div>
            </div>
          </div>
          Pricing card enterprise
          <div class="col-lg-6 col-xl-4">
            <div class="card">
              <div class="card-body p-5">
                <div class="small text-uppercase fw-bold text-muted">
                  Enterprise
                </div>
                <div class="mb-3">
                  <span class="display-4 fw-bold">$49</span>
                  <span class="text-muted">/ mo.</span>
                </div>
                <ul class="list-unstyled mb-4">
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    <strong>Unlimited users</strong>
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    5GB storage
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Unlimited public projects
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Community access
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Unlimited private projects
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    Dedicated support
                  </li>
                  <li class="mb-2">
                    <i class="bi bi-check text-primary"></i>
                    <strong>Unlimited</strong>
                    linked domains
                  </li>
                  <li class="text-muted">
                    <i class="bi bi-check text-primary"></i>
                    Monthly status reports
                  </li>
                </ul>
                <div class="d-grid">
                  <a class="btn btn-outline-primary" href="#!">Choose plan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Testimonials section-->
    <section class="py-5 border-bottom">
      <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
          <h2 class="fw-bolder">Customer testimonials</h2>
          <p class="lead mb-0">Our customers love working with us</p>
        </div>
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-6">
            <!-- Testimonial 1-->
            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i
                      class="bi bi-chat-right-quote-fill text-primary fs-1"
                    ></i>
                  </div>
                  <div class="ms-4">
                    <p class="mb-1">
                      We loved visiting Shasta and loved his ice cream even
                      more! Definitely will be coming back in the future.
                    </p>
                    <div class="small text-muted">- Client Name, Location</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Testimonial 2-->
            <div class="card">
              <div class="card-body p-4">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i
                      class="bi bi-chat-right-quote-fill text-primary fs-1"
                    ></i>
                  </div>
                  <div class="ms-4">
                    <p class="mb-1">
                      The entire visit was an enjoyable visit. Food services
                      were great, and staff were really friendly. A fun
                      experience for everyone of all ages.
                    </p>
                    <div class="small text-muted">- Client Name, Location</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact section-->
    <section class="bg-light py-5" id="contact-us">
      <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
          <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
            <i class="bi bi-envelope"></i>
          </div>
          <h2 class="fw-bolder">Get in touch</h2>
          <p class="lead mb-0">We'd love to hear from you</p>
        </div>
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-6">
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
              <!-- Name input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="name"
                  type="text"
                  placeholder="Enter your name..."
                  data-sb-validations="required"
                />
                <label for="name">Full name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">
                  A name is required.
                </div>
              </div>
              <!-- Email address input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="email"
                  type="email"
                  placeholder="name@example.com"
                  data-sb-validations="required,email"
                />
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">
                  An email is required.
                </div>
                <div class="invalid-feedback" data-sb-feedback="email:email">
                  Email is not valid.
                </div>
              </div>
              <!-- Phone number input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="phone"
                  type="tel"
                  placeholder="(123) 456-7890"
                  data-sb-validations="required"
                />
                <label for="phone">Phone number</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">
                  A phone number is required.
                </div>
              </div>
              <!-- Message input-->
              <div class="form-floating mb-3">
                <textarea
                  class="form-control"
                  id="message"
                  type="text"
                  placeholder="Enter your message here..."
                  style="height: 10rem"
                  data-sb-validations="required"
                ></textarea>
                <label for="message">Message</label>
                <div
                  class="invalid-feedback"
                  data-sb-feedback="message:required"
                >
                  A message is required.
                </div>
              </div>
              <!-- Submit success message-->
              <!---->
              <!-- This is what your users will see when the form-->
              <!-- has successfully submitted-->
              <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                  <div class="fw-bolder">Form submission successful!</div>
                  To activate this form, sign up at
                  <br />
                  <a href="https://startbootstrap.com/solution/contact-forms"
                    >https://startbootstrap.com/solution/contact-forms</a
                  >
                </div>
              </div>
              <!-- Submit error message-->
              <!---->
              <!-- This is what your users will see when there is-->
              <!-- an error submitting the form-->
              <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">
                  Error sending message!
                </div>
              </div>
              <!-- Submit Button-->
              <div class="d-grid">
                <button
                  class="btn btn-primary btn-lg disabled"
                  id="submitButton"
                  type="submit"
                >
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container px-5">
        <p class="m-0 text-center text-white">
          Copyright &copy; Your Website 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>