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

$isManager = false;

$query = mysqli_query($conn, "SELECT * FROM `employee`, `workplace` WHERE '$user_id' = manager_id") or die('Query failed.');

if (mysqli_num_rows($query) > 0) {
    $isManager = true;
    $_SESSION['ismanager'] = true;
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
                <a href="Profile.php" class="styledLink">Update Profile</a>
            </li>
            <?php
            if ($isManager) {
                echo '<li class="listItem">
                <a href="../manager/manager.php" class="styledLink">Manager Portal</a>
            </li>';
            }
            ?>
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
            <h3>This Week's Schedule</h3>
            <div class="dashboard">
                <table class="home-table">
                    <thead>
                        <tr>
                            <th>
                                <h4>
                                    Work Days
                                </h4>
                            </th>
                            <?php

                            $days = $fetch['work_days'];
                            $days_arr = explode(",", $days);

                            foreach ($days_arr as $workDays) {
                                echo "<th><h4>$workDays</h4></th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <h4>
                                    Clock In
                                </h4>
                            </th>
                            <?php

                            $start = $fetch['clock_in'];
                            $start_arr = explode(",", $start);

                            foreach ($start_arr as $clockIn) {
                                echo "<td><p class='td-p'>$clockIn</p></td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <th>
                                <h4>
                                    Clock Out
                                </h4>
                            </th>
                            <?php

                            $end = $fetch['clock_out'];
                            $end_arr = explode(",", $end);

                            foreach ($end_arr as $clockOut) {
                                echo "<td><p>$clockOut</p></td>";
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>

            </div>
            <a href="./Home.php" class="main-button">Go Back</a>
        </div>
    </div>

</body>

</html>