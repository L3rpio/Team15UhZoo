<?php 
session_start();
require_once '../includes/dbh.inc.php';
if(isset($_POST['product_id']))
{
	$product_id=$_POST['product_id'];

$user_id=$_SESSION['id'];


//get total_product_quntity//

$query_sum  = 
"SELECT SUM(product_qty) as qs
FROM `cart_table`
WHERE `user_id`='$user_id'"; 

$result_sum = mysqli_query($conn, $query_sum);

$total = 0;
$rec = $result_sum->fetch_assoc();
$total_sum = $rec['qs'];





if($total_sum ==3)
{
echo 3;
}
else
{



$query  = "SELECT * FROM `cart_table` WHERE `user_id`='$user_id' and `product_id`='$product_id'";

//echo $query;
$result = mysqli_query($conn, $query);

$rowcount=mysqli_num_rows($result);

if($rowcount>=1)
{
//update//
$row = mysqli_fetch_array($result);
$product_qty=$row['product_qty']+1;



$query_update  = "UPDATE `cart_table` SET 


`product_qty`='$product_qty'

where `user_id`='$user_id' and 
`product_id`='$product_id'


";
$result_update = mysqli_query($conn, $query_update);

if($result_update)
{
echo 1;
}
else
{
echo 2;
}


}
else
{
	//insert//





$query_insert  = "INSERT INTO `cart_table`(`user_id`, `product_id`, `product_qty`) 
VALUES ('$user_id','$product_id','1')";



$result_insert = mysqli_query($conn, $query_insert);

if($result_insert)
{
echo 1;
}
else
{
echo 2;
}

}//insert close//

}///maximum 3 product can add//

}//isset close//

?>