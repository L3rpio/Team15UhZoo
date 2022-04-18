<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UH Zoo: Guest Registration</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="EmployeePortal/css/style.css">
</head>

<body>
    <nav class="navbar">
        <span class="logo"><a href="index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="index.php" class="nav-logout">Back Home</a>
            </li>
        </ul>
    </nav>
    <div class="form-container">



        <section class="signup-form">
            <form action="includes/signup.inc.php" method="post">
                <h3>Guest Registration</h3>
                <input type="text" name="fname" placeholder="First Name..." class="box" required>
                <input type="text" name="lname" placeholder="Last Name..." class="box" required>
                <input type="text" name="username" placeholder="Username..." class="box" required>
                <input type="text" name="email" placeholder="Email..." class="box" required>
                <input type="password" name="password" placeholder="Password..." class="box" required>
                <input type="password" name="passwordrepeat" placeholder="Repeat password..." class="box" required>
                <button type="submit" name="submit" class="main-button">Sign Up</button>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>You left one of the fields empty!</p>";
                    } else if ($_GET["error"] == "invalidUID") {
                        echo "<p>Your username has invalid characters!</p>";
                    } else if ($_GET["error"] == "bademail") {
                        echo "<p>Your email is not valid!</p>";
                    } else if ($_GET["error"] == "pwdmissmatch") {
                        echo "<p>Your two passwords do not match!</p>";
                    } else if ($_GET["error"] == "useralreadyexists") {
                        echo "<p>Your username and/or email is taken! Try entering a different one.</p>";
                    } else if ($_GET["error"] == "none") {
                        echo "<p>You have signed up!</p>";
                    }
                }
                ?>
                <p>Already created an account? <a href="LoginPage.php">Customer Login</a></p>
            </form>
        </section>




    </div>
</body>

</html>