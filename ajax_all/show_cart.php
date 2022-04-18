<?php 
session_start();
require_once '../includes/dbh.inc.php';


$user_id=$_SESSION['id'];

$query  = "SELECT * FROM `cart_table` WHERE `user_id`='$user_id'";

//echo $query;
$result = mysqli_query($conn, $query);

if(!empty($result))
{


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
$total_cost=$product_cost*$product_qty;
echo "
<li><div class='order_food_box'>
<span><img src='$product_image'></span></span>
<div class='food_detail_box'>
<h2>$product_name</h2>
<p>$product_desc</p>
<h2>
<i class='fa fa-usd' aria-hidden='true'></i>
$total_cost</h2>


</div>

</div>
<span class='add_btn'>$product_qty</span>
</li>";


	
}






	
}
else
{
	echo "No data found";
}
?>