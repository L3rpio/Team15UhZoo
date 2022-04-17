

<?php
include 'includes/dbh.inc.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('location:LoginPage.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="EmployeePortal/css/style.css">

</head>
<body>
    <nav class="navbar">
        <span class="logo"><a href="index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="GuestLanding.php" class="nav-logout">Go Back</a>
            </li>
        </ul>
    </nav>
    <div class="update-profile">


        <?php
        // $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');
        // if (mysqli_num_rows($select) > 0) {
        //     $fetch = mysqli_fetch_assoc($select);
        // }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
        <h3>Welcome, <?php echo $_SESSION['first_name']; ?>! How do you want to change your profile?</h3>
            <?php
            // if ($fetch['image'] == '' || $fetch['image'] == NULL) {
            //     echo '<img src="images/defaultUser.jpg">';
            // } else {
            //     echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            // }
            // echo '<h3>' . $fetch['employee_first_name'] . " " . $fetch['employee_last_name'] . '</h3>';

            // if (isset($message)) {
            //     foreach ($message as $message) {
            //         echo '<div class="message">' . $message . '</div>';
            //     }
            // }
            // if (isset($success)) {
            //     foreach ($success as $success) {
            //         echo '<div class="success">' . $success . '</div>';
            //     }
            // }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" name="update_username" value="<?php echo $_SESSION['user_name']; ?>" class="box">
                    <span>Your Email:</span>
                    <input type="email" name="update_email" value="<?php echo $_SESSION['email']; ?>" class="box">
                    <!-- <span>Update Your Profile Pic:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="file-box"> -->
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $_SESSION['pass_word']; ?>">
                    <span>Old Password:</span>
                    <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box" required>
                    <span>New Password:</span>
                    <input type="password" name="new_pass" placeholder="Enter New Password" class="box" required>
                    <span>Confirm Password :</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box" required>
                    Dev note:
                    Will only change password.
                    Password change not implemented yet.
                </div>
            </div>
            <input type="submit" value="Submit Changes" name="update_profile" class="btn">

        </form>

    </div>

</body>

</html>


