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
    <title>UH Zoo: update profile</title>
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

    <form action="includes/guestUpdate.inc.php" method="post">
        <h3>Welcome, <?php echo $_SESSION['first_name']." ". $_SESSION['last_name']; ?>! Do you want to update or delete your profile?</h3>
            <div class="flex">
                <div class="inputBox">

                
                    <span class>Username: </span>
                    <span class="box"> <?php echo $_SESSION['user_name']; ?> </span>
                    <span>Your Email: </span>
                    <span class="box"> <?php echo $_SESSION['email']; ?> </span>
                </div>
                <div class="inputBox">
                    <input type="hidden" name="user_name" value="<?php $_SESSION['user_name'];?>">
                    <span>Old Password:</span>
                    <input type="password" name="entered_pass" placeholder="Enter Previous Password" class="box" required>
                    <span>New Password:</span>
                    <input type="password" name="new_pass" placeholder="Enter New Password" class="box" required>
                    <span>Confirm Password :</span>
                    <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box" required>
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "pwdmissmatch") {
                                        echo "<p>Your two passwords do not match!</p>";
                                }   
                                if ($_GET["error"] == "oldpasswordwrong") {
                                    echo "<p>Your old password is wrong!</p>";
                                }   
                        }
                        ?>
                </div>
            </div>
            <input type="submit" value="Update Password" name="update_profile" class="main-button">
            <input type="submit" value="Delete Profile" name="delete_profile" class="nav-logout">
        </form>
    </div>
</body>
</html>

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

<?php
        // $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');
        // if (mysqli_num_rows($select) > 0) {
        //     $fetch = mysqli_fetch_assoc($select);
        // }
        ?>
                            <!-- <input type="hidden" name="old_pass" value="<?php echo $_SESSION['pass_word']; ?>"> -->