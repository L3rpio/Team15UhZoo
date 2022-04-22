<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    //first check if the employee is an admin
    $admin = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($admin) > 0) {
        $row = mysqli_fetch_assoc($admin);
        $_SESSION['user_id'] = $row['id'];
        header('location: ../admin_portal/admin_portal.php');
    }

    // first check if the username and password matches any of our employees
    $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE user_name = '$username' AND pass_word = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['employee_id'];
        header('location:Home.php');
    } else {
        $message[] = 'Incorrect Username or Password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar">
        <span class="logo"><a href="../index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="../index.php" class="nav-logout">Back Home</a>
            </li>
        </ul>
    </nav>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Login</h3>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <input type="text" name="username" placeholder="Username" class="box" required>
            <input type="password" name="password" placeholder="Password" class="box" required>
            <input type="submit" name="submit" value="Submit" class="main-button">
            <p>Just got hired? <a href="Register.php">Register now</a></p>
        </form>

    </div>

</body>

</html>