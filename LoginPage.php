<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UH Zoo: Customer Login</title>
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
            <form action="includes/login.inc.php" method="post">
                <h3>Customer Login</h3>
                <input type="text" name="username" placeholder="Username" class="box" required>
                <input type="password" name="password" placeholder="Password" class="box" required>
                <button type="submit" name="submit" class="main-button">Log in</button>
                <?php

                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p>You left one of the fields empty!</p>";
                    }
                    if ($_GET["error"] == "wronglogin") {
                        echo "<p>Incorrect Login Information!</p>";
                    }
                }
                ?>
                <p>New guest? <a href="GuestSignUp.php">Guest Registration</a></p>
                <p>Are you an employee? <a href="./EmployeePortal/Login.php">Employee Login</a></p>
            </form>
        </section>



        <!-- <form action="" method="post" enctype="multipart/form-data">
            <h3>Login</h3>
            <?php
            // if (isset($message)) {
            //     foreach ($message as $message) {
            //         echo '<div class="message">' . $message . '</div>';
            //     }
            // }
            ?>
            <input type="text" name="username" placeholder="Username" class="box" required>
            <input type="password" name="password" placeholder="Password" class="box" required>
            <input type="submit" name="submit" value="Submit" class="btn">

        </form> -->


    </div>
</body>

</html>