<?php
session_start();
if (!isset($_SESSION['id'])) 
{
//header('location:LoginPage.php');
};
require_once 'includes/dbh.inc.php';

?>


<!Doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" href="assets/frontend_assets/css/bootstrap.css">

<link rel="stylesheet" href="assets/frontend_assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<title>Product</title>
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

<div class="banner-container">
<div class="container desc-tabs-container">


<?php 

    //take all data from cart//

$user_id=$_SESSION['id'];


$query  = "SELECT * FROM `cart_table` WHERE `user_id`='$user_id'";
$result = mysqli_query($conn, $query);

$order_no=rand(1111,9999);

$all_total_price=0;
while ($row = mysqli_fetch_array($result))
{

$product_id=$row['product_id'];
$query1  = "SELECT * FROM `product` WHERE `product_id`='$product_id'";

//echo $query;
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1);

$product_name=$row1['product_name'];
$product_desc=$row1['product_desc'];
$product_image=$row1['product_image'];
$product_qty=$row['product_qty'];



$product_cost=$row1['product_cost'];

$total_price=$product_qty*$product_cost; 

$query_insert  = "INSERT INTO `order_items`(


    `order_number`, 
    `user_id`,
    `product_id`,
    `product_name`,
    


     `product_qty`,
     `single_product_price`,
     `total_price`


     ) 
VALUES (

    '$order_no',
    '$user_id',
    '$product_id',
    '$product_name',
    
    '$product_qty',
    '$product_cost',
    '$total_price'





)";

mysqli_query($conn, $query_insert);

$all_total_price+=$total_price;
}//loop close//










//insert order table//

$query_insert_order  = "INSERT INTO `orders`(


    `order_number`, 
    `user_id`,
     `totalQty`,
    


     `total_price`,
     `order_status`
     


     ) 
VALUES (

    '$order_no',
    '$user_id',
    '$product_qty',
    
    '$all_total_price',
    'success'
   





)";

$query_insert=mysqli_query($conn, $query_insert_order );



if($query_insert)
{
//delete the cart table//


$query_delete  = "DELETE FROM `cart_table` WHERE `user_id`='$user_id'";
mysqli_query($conn, $query_delete);







    echo "<h1 style='color:red;'>Thank you for placing your order. Your Order id is ".$order_no." We are preparing your order. </h1>";
}
else
{
    echo "some error occur";
}









?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
.container.desc-tabs-container h1 {
    padding: 7px 17px;
    display: table;
    text-align: center;
    font-weight: 500;
    font-size: 17px;
    background-color: var(--green);
    color: var(--light-color)!important;
    border-radius: 4px;
    margin: 0 auto;
}
</style>

<!--<script src="assets/frontend_assets/js/jquery.js"></script>-->
<script src="assets/frontend_assets/js/bootstrap.js"></script>
<script type="text/javascript">

</script>
</body>

</html>