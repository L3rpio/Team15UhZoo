<?php 
session_start();
require_once '../includes/dbh.inc.php';
if(isset($_POST['product_id']))
{
	$product_id=$_POST['product_id'];

$user_id=$_SESSION['id'];






$query_delete  = "DELETE FROM `cart_table` WHERE `user_id`='$user_id' and `product_id`='$product_id'";
mysqli_query($conn, $query_delete);


if($query_delete)
{
	echo 1;
}
else
{
	echo 2;
}

}//isset close//
else
{
	echo 3;
}
?>