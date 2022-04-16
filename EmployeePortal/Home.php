<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:Login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:Login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar">
        <span class="logo"><a href="../index.php" class="styledLink">UH Zoo</a></span>
        <ul class="navlist">
            <li class="listItem">
                <a href="Profile.php" class="nav-btn">Update Profile</a>
            </li>
            <li class="listItem">
                <a href="home.php?logout=<?php echo $user_id; ?>" class="nav-logout">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container">

        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
                echo '<img src="images\defaultUser.jpg">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            ?>
            <h3>Welcome, <?php echo $fetch['employee_first_name']; ?>!</h3>
            <div class="dashboard">
                <table class="home-table">
                    <thead>
                        <tr>
                            <th>
                                <h4>
                                    Hours Worked
                                </h4>
                            </th>
                            <th>
                                <h4>
                                    Hourly Wage
                                </h4>
                            </th>
                            <th>
                                <h4>
                                    Paycheck
                                </h4>
                            </th>
                            <th>
                                <h4>
                                    Status
                                </h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>
                                    <?php $hours = $fetch['hours_worked'];
                                    if ($hours == NULL) {
                                        echo '0';
                                    } else {
                                        echo $hours;
                                    } ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo '$' . $fetch['hourly_wage']; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php $pay = $fetch['paycheck'];
                                    if ($pay == NULL) {
                                        echo '$0.00';
                                    } else {
                                        echo '$' . $pay;
                                    } ?>
                                </p>
                            </td>
                            <td>
                                <?php $status = $fetch['paid_status'];
                                if ($status == 0) {
                                    echo '<p class="status-unpaid">Unpaid</p>';
                                } else if ($status == 1) {
                                    echo '<p class="status-paid">Paid</p>';
                                } else {
                                    echo '<p class="status-pending">Pending</p>';
                                } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>