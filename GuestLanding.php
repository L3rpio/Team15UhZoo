<?php
session_start();
if (!isset($_SESSION['id'])) 
{
header('location:LoginPage.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UH Zoo: Guest Landing</title>
<link rel="stylesheet" href="EmployeePortal/css/style.css">
</head>

<body>
<nav class="navbar">
<span class="logo"><a href="GuestLanding.php" class="styledLink">UH Zoo</a></span>
<ul class="navlist">
<li class="listItem">
<a href="GuestProfileEdit.php" class="nav-btn">Update Profile</a>
</li>
<li class="listItem">
<a href="includes/logout.inc.php" class="nav-logout">Logout</a>
</li>
</ul>
</nav>
<div class="container">

<div class="profile">
<?php
// $select = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');
// if (mysqli_num_rows($select) > 0) {
//     $fetch = mysqli_fetch_assoc($select);
// }
// if ($fetch['image'] == '') {
//     echo '<img src="images\defaultUser.jpg">';
// } else {
//     echo '<img src="uploaded_img/' . $fetch['image'] . '">';
// }


?>
<h3>Welcome, <?php echo $_SESSION['first_name']. " ". $_SESSION['last_name'];?>!</h3>
<div class="dashboard">
<table class="home-table">
<thead>
</thead>


<a href="ticket/ticket.php" class="nav-btn">Order your tickets here!</a>
</br>
<a href="product.php" class="nav-btn">Pre Order Food here!</a>
<!-- <tbody>
    <tr>
        <td>
            <p>
            <a href="GuestProfileEdit.php" class="nav-btn">Update Profile</a>
               <a href="" class=""> Click here to go to your tickets!</a>
            </p>
        </td>
    </tr>
</tbody> -->


<!-- </table><center><a href="product.php"><button class="btn btn-success">Pre Order Food</button></a></center>  -->

<!-- 
<a href="product.php" class=""> Pre Order Food here!</a> -->
</div>
</div>

</div>

</body>

</html>