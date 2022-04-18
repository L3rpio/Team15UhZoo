<?php
session_start();
if (!isset($_SESSION['id'])) 
{
header('location:LoginPage.php');
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


<ul class="nav nav-pills row" id="pills-tab" role="tablist">


<?php 

if($_GET['restaurent_id']=='')
{
	$restaurent_id=1;
}
else
{
	$restaurent_id=$_GET['restaurent_id'];
}






$query  = "SELECT * FROM `restaurent` WHERE 1";
$result = mysqli_query($conn, $query);

$i=1;
while ($row = mysqli_fetch_array($result))
{  
$restaurent_id=$row['restaurent_id'];
?>

<li class="nav-item col-md-4">
<a class="nav-link 
<?php 
if($i==1)
{
echo 'active';
}
else
{
	echo '';
}


?>" 
 href="product.php?restaurent_id=<?php echo $restaurent_id;?>" 
role="tab" aria-controls="pills-home<?php echo $i;?>" aria-selected="
<?php 
if($i==1)
{
echo 'true';
}
else
{
	echo 'false';
}


?>



">


<div class="card" >
<img class="card-img-top" src="<?php echo $row['restaurent_image'];?>" alt="Card image cap">
<div class="card-body">
<h3><?php echo $row['restaurent_name'];?></h3>
<p class="card-text">
<?php echo $row['restaurent_desc'];?>
</p>
</div>
</div>
</a>
</li>





<?php 
$i++;
}

?>




</ul>











<!--===============================RESTURENT BLOCK 1 START======================-->
<?php 
$user_id=$_SESSION['id'];
if($_GET['restaurent_id']=='')
{
	$restaurent_id=1;
}
else
{
	$restaurent_id=$_GET['restaurent_id'];
}


$query  = "SELECT * FROM `restaurent` WHERE `restaurent_id`='$restaurent_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);


$query1  = "SELECT * FROM `product` WHERE `restaurent_id`='$restaurent_id'";
$result1 = mysqli_query($conn, $query1);

?>

<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<h1><?php echo $row['restaurent_name'];?></h1>
<div class="item-list-container">
<ul>


<?php 
$i=1;
 $rowcount=mysqli_num_rows($result1);
if($rowcount>=1)
{
while ($row1 = mysqli_fetch_array($result1))
{  
$product_id=$row1['product_id'];
?>


<li><div class="order_food_box">
<span><img src="<?php echo $row1['product_image'];?>"></span></span>
<div class="food_detail_box">
<h2><?php echo $row1['product_name'];?></h2>
<p><?php echo $row1['product_desc'];?></p>
<h2>
<i class="fa fa-usd" aria-hidden="true"></i>

<?php echo $row1['product_cost'];?></h2>
</div>

</div>
<!--<span class="add_btn">Add +</span>-->



<button type="button" 
product_id="<?php echo  $product_id;?>"
onclick="addToCart(this)" 
class="btn btn-sm add_btn">
Add
</button>

<?php 
$query_cart  = "SELECT * FROM `cart_table` WHERE `user_id`='$user_id' and 
`product_id`='$product_id'";
$result_cart = mysqli_query($conn, $query_cart);

 $rowcount_cart=mysqli_num_rows($result_cart);

if($rowcount_cart>=1)
{
?>
<button type="button" 
product_id="<?php echo  $product_id;?>"
onclick="deleteCart(this)" 
class="btn btn-sm add_btn">
Delete
</button>

<?php 
}

?>




<span class="add_btn edit_btn" style="display:none;">Edit</span>
</li>


<?php 

}
}
else
{
?>
<li>
<div class="order_food_box">
<center>
	No Product Found
</center>
</div>


</li>

<?php	
}
?>










</ul>
<?php 
if($rowcount>=1)
{

?>
<!--<a href="#" data-toggle="modal" class="proceed-btn" data-target="#exampleModal" >Proceed</a>-->
<button onclick="cart_modal(this)"  
class="proceed-btn"  type="button">
Proceed</button>
<?php 
}

?>


</div>
</div>


<!--===============================RESTURENT BLOCK 1 END======================-->











<!--============================MODAL START===============================-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form method="post" action="order_submit.php">


<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Are you sure want to order</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<div class="item-list-container">



<ul>



<div class="flash-message"></div>









</ul>

</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-secondary" value="yes">


<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
No
</button>


</div>
</form>



</div>


</div>
</div>
</div>


<!--============================MODAL START===============================-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<!--<script src="assets/frontend_assets/js/jquery.js"></script>-->
<script src="assets/frontend_assets/js/bootstrap.js"></script>
<script type="text/javascript">

</script>
</body>

</html>


<script type="text/javascript">
function addToCart(obj)
{

var product_id=obj.getAttribute("product_id");

//alert(product_id);


    $.ajax({
    
      type : 'POST',
      url : 'ajax_all/add_to_cart.php',
      data :{product_id:product_id},
     
      cache : false,
      success : function(res) 
      {
        if(res==1)
        {  
       
         alert('Product Successfully Added');
          location.reload();
        }
        else if(res==3)
        {
       
         alert('Maximum 3 product are allow');

        }
        else
        {
        	alert('error');
        }
      },





error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        //$('#post').html(msg);
         //$('div.flash-message').html(msg);
alert(msg);


    },




    });



}
</script>



<script type="text/javascript">


function cart_modal(obj)
{



$.ajax({
  
      type : 'POST',
      url : "ajax_all/show_cart.php",
      cache: false,
      cache: false,
     
      success : function(res) {
   

$('div.flash-message').html(res);


$("#exampleModal").modal("show");
        
      },

error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        //$('#post').html(msg);
      alert(msg)
    },



});






}

</script>



<script type="text/javascript">
function deleteCart(obj)
{

var product_id=obj.getAttribute("product_id");

//alert(product_id);


    $.ajax({
    
      type : 'POST',
      url : 'ajax_all/delete_cart.php',
      data :{product_id:product_id},
     
      cache : false,
      success : function(res) 
      {
        if(res==1)
        {  
         
         alert('Product Successfully Delete');
         location.reload();
        }
        else if(res==3)
        {
       
         alert('THis product is not in your cart');

        }
        else
        {
        	alert('error');
        }
      },





error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        //$('#post').html(msg);
         //$('div.flash-message').html(msg);
alert(msg);


    },




    });



}


var cd;$('.nav-item').each(function() {
if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
$(this).addClass('card_active').siblings().removeClass('card_active');
}
});



var cd;$('.nav-link').each(function() {
if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
$(this).addClass('active').siblings().removeClass('active');
}
});




</script>

