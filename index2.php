<!DOCTYPE html>

<?php
session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>UH Zoo</title>
  </head>
  <body>
    <section class="showcase">
      <header>
        <h2 class="logo">UH Zoo</h2>
        <div class="toggle"></div>
      </header>
      <video src="./resources/uhcourgars.mp4" muted loop autoplay></video>

      <div class="overlay"></div>

      <div class="text">
        <h3>Welcome to the</h3>
        <h2>UH Zoo</h2>
        <p>
          We are proud to annouce that we have offically opened up our zoo to
          the public. Sign up for an account with us to get tickets to visit us
          today!
        </p>
        <a href="LoginPage.php">Login</a>
        <a href="#=GuestSignUp.php">Sign Up</a>
        <?php

                            if(isset($_GET["msg"])){
                              if($_GET["msg"] == "loggedout"){
                                  echo "</br>";
                                  echo "</br>";
                                  echo "<p>Hello! You have logged out!</p>";
                                  echo "</br>";
                              }
                            }
                            // if(isset($_GET["msg"])){
                            //   if($_GET["msg"] == "loggedin"){
                            //       echo "</br>";
                            //       echo "</br>";
                            //       echo "<p>Hello! You have logged in!</p>";
                            //       echo "</br>";
                            //   }
                            // }
                            // echo 'HelloS ' . htmlspecialchars($_SESSION['user_name']) . '!';
                            // echo 'SESSION VarDump:' .var_dump($_SESSION);
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
                            // echo 'HelloC ' . htmlspecialchars($_COOKIE["id"]) . '!';
                            // echo "</br>";
                            // echo "</br>";
                            // echo "</br>";
                            // echo 'Cookie VarDump:' .var_dump($_COOKIE);
                            // var_dump($_COOKIE);
                            // if(isset($_COOKIE['id'])){
                            //   echo "Hello, from cookies!";

                            //   echo "</br>";
                            //   echo "<p>Hello! You have logged in!</p>";
                            //   echo "Username: ";
                            //   echo $_COOKIE['user_name'];
                            //   echo "</br>";
                            //   echo "First Name: ";
                            //   echo $_COOKIE['first_name'];
                            //   echo "</br>";
                            //   echo "Last Name: ";
                            //   echo $_COOKIE['last_name'];
                            //   echo "</br>";
                            //   echo "<a href='profile.php'>Profile Page</a>";
                            //   echo "</br>";
                            //   echo "<a href='includes/logout.inc.php'>Log Out</a>";
                            // }
                            ob_flush();

                ?>
      </div>
      <ul class="social">
        <li>
          <a href="#"
            ><img src="https://i.ibb.co/x7P24fL/facebook.png" alt=""
          /></a>
        </li>
        <li>
          <a href="#"
            ><img src="https://i.ibb.co/Wnxq2Nq/twitter.png" alt=""
          /></a>
        </li>
        <li>
          <a href="#"
            ><img src="https://i.ibb.co/ySwtH4B/instagram.png" alt=""
          /></a>
        </li>
      </ul>
    </section>

    <div class="menu">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Customer Portal</a></li>
        <li><a href="#">Employee Portal</a></li>
        <li><a href="manager/manager.php">Manager Portal</a></li>
        <li><a href="ticket.php">Reserve Tickets</a></li>
        <li><a href="#">Preorder Food</a></li>
      </ul>
    </div>

    <script>
      const menuToggle = document.querySelector(".toggle");
      const showCase = document.querySelector(".showcase");

      menuToggle.addEventListener("click", () => {
        menuToggle.classList.toggle("active");
        showCase.classList.toggle("active");
      });
    </script>
  </body>
</html>
