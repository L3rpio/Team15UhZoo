<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_email = '$email' AND employee_id = '$id'") or die('Query failed.');

    $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$id' AND (user_name is not null AND pass_word is not null)") or die('Query failed.');

    if (mysqli_num_rows($select) == 0) {
        $message[] = "Employee credentials are invalid.";
    } else if (mysqli_num_rows($query) > 0) {
        $message[] = "Employee already exists. Please Login.";
    } else {
        if ($pass != $cpass) {
            $message[] = 'Passwords did not match!';
        } elseif ($image_size > 2000000) {
            $message[] = 'image size is too large!';
        } else {
            if (!empty($image)) {
                $update = mysqli_query($conn, "UPDATE `employee` SET user_name = '$username', pass_word = '$pass', image = '$image' WHERE employee_id = '$id'") or die('query failed');

                if ($update) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $success[] = 'Registered Successfully!';
                    header('location:Login.php');
                } else {
                    $message[] = 'Registration failed!';
                }
            } else if (empty($image)) {
                mysqli_query($conn, "UPDATE `employee` SET user_name = '$username', pass_word = '$pass' WHERE employee_id = '$id'") or die('query failed');

                $success[] = 'Registered Successfully!';
            } else {
                $message[] = 'Registration failed!';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
            <h3>Register</h3>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            if (isset($success)) {
                foreach ($success as $success) {
                    echo '<div class="success">' . $success . '</div>';
                }
            }
            ?>
            <div class="confirm">
                <h4>Confirm your credentials</h4>
                <input type="number" min="1" max="99999999999" name="id" placeholder="Confirm Employee ID" class="box" required>
                <input type="email" name="email" placeholder="Confirm Email" class="box" required>
            </div>
            <input type="text" name="username" placeholder="Enter Username" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
            <input type="file" name="image" class="file-box" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" name="submit" value="Submit" class="main-button">
            <p>Forgot you had an account? <a href="Login.php">Login now</a></p>
        </form>

    </div>

</body>

</html>