<?php

include '../EmployeePortal/config.php';
session_start();
$user_id = $_SESSION['id'];

if (!isset($user_id)) {
    header('location:../LoginPage.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location: ../LoginPage.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Portal</title>

    <link rel="stylesheet" href="css/customer.css">
</head>

<body>
    <nav class="customer-nav">
        <span class="logo"><a href="../index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="Profile.php" class="nav-btn">Update Profile</a>
            </li>
            <li class="listItem">
                <a href="Home.php?logout=<?php echo $user_id; ?>" class="nav-logout">Logout</a>
            </li>
        </ul>
    </nav>
    <section class="page-container">
        <div class="home-body">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `customer` WHERE customer_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
                echo '<img src="images\defaultUser.jpg" class="profile-pic">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '" class="profile-pic">';
            }
            ?>
            <h3>Welcome, <?php echo $fetch['first_name']; ?>!</h3>
        </div>
    </section>
</body>

</html>