<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

    $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE `employee` SET user_name = '$update_username', employee_email = '$update_email' WHERE employee_id = '$user_id'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Old password incorrect!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password does not match!';
        } else {
            mysqli_query($conn, "UPDATE `employee` SET pass_word = '$confirm_pass' WHERE employee_id = '$user_id'") or die('query failed');
            $success[] = 'Password updated successfully!';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image is too large';
        } else {
            $image_update_query = mysqli_query($conn, "UPDATE `employee` SET image = '$update_image' WHERE employee_id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $success[] = 'Image updated successfully!';
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
    <title>update profile</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar">
        <span class="logo"><a href="../index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="home.php" class="nav-logout">Go Back</a>
            </li>
        </ul>
    </nav>
    <div class="update-profile">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['image'] == '' || $fetch['image'] == NULL) {
                echo '<img src="images/defaultUser.jpg">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            echo '<h3>' . $fetch['employee_first_name'] . " " . $fetch['employee_last_name'] . '</h3>';

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
            <div class="flex">
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" name="update_username" value="<?php echo $fetch['user_name']; ?>" class="box">
                    <span>Your Email:</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['employee_email']; ?>" class="box">
                    <span>Update Your Profile Pic:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="file-box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['pass_word']; ?>">
                    <span>Old Password:</span>
                    <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box" required>
                    <span>New Password:</span>
                    <input type="password" name="new_pass" placeholder="Enter New Password" class="box" required>
                    <span>Confirm Password :</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box" required>
                </div>
            </div>
            <input type="submit" value="Submit Changes" name="update_profile" class="btn">

        </form>

    </div>

</body>

</html>