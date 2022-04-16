<!DOCTYPE html>
<html lang="en">
	 <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title>Manange Customer Accounts</title>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
			<style>
				 body {
				 color: #566787;
				 background: #f5f5f5;
				 font-family: 'Varela Round', sans-serif;
				 font-size: 13px;
				 }
				 .table-responsive {
				 margin: 30px 0;
				 }
				 .table-wrapper {
				 background: #fff;
				 padding: 20px 25px;
				 border-radius: 3px;
				 min-width: 1000px;
				 box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
				 }
				 .table-title {
				 padding-bottom: 15px;
				 background: #435d7d;
				 color: #fff;
				 padding: 16px 30px;
				 min-width: 100%;
				 margin: -20px -25px 10px;
				 border-radius: 3px 3px 0 0;
				 }
				 .table-title h2 {
				 margin: 5px 0 0;
				 font-size: 24px;
				 }
				 .table-title .btn-group {
				 float: right;
				 }
				 .table-title .btn {
				 color: #fff;
				 float: right;
				 font-size: 13px;
				 border: none;
				 min-width: 50px;
				 border-radius: 2px;
				 border: none;
				 outline: none !important;
				 margin-left: 10px;
				 }
				 .table-title .btn i {
				 float: left;
				 font-size: 21px;
				 margin-right: 5px;
				 }
				 .table-title .btn span {
				 float: left;
				 margin-top: 2px;
				 }
				 table.table tr th,
				 table.table tr td {
				 border-color: #e9e9e9;
				 padding: 12px 15px;
				 vertical-align: middle;
				 }
				 table.table tr th:first-child {
				 width: 60px;
				 }
				 table.table tr th:last-child {
				 width: 100px;
				 }
				 table.table-striped tbody tr:nth-of-type(odd) {
				 background-color: #fcfcfc;
				 }
				 table.table-striped.table-hover tbody tr:hover {
				 background: #f5f5f5;
				 }
				 table.table th i {
				 font-size: 13px;
				 margin: 0 5px;
				 cursor: pointer;
				 }
				 table.table td:last-child i {
				 opacity: 0.9;
				 font-size: 22px;
				 margin: 0 5px;
				 }
				 table.table td a {
				 font-weight: bold;
				 color: #566787;
				 display: inline-block;
				 text-decoration: none;
				 outline: none !important;
				 }
				 table.table td a:hover {
				 color: #2196F3;
				 }
				 table.table td a.edit {
				 color: #FFC107;
				 }
				 table.table td a.delete {
				 color: #F44336;
				 }
				 table.table td i {
				 font-size: 19px;
				 }
				 table.table .avatar {
				 border-radius: 50%;
				 vertical-align: middle;
				 margin-right: 10px;
				 }
				 .pagination {
				 float: right;
				 margin: 0 0 5px;
				 }
				 .pagination li a {
				 border: none;
				 font-size: 13px;
				 min-width: 30px;
				 min-height: 30px;
				 color: #999;
				 margin: 0 2px;
				 line-height: 30px;
				 border-radius: 2px !important;
				 text-align: center;
				 padding: 0 6px;
				 }
				 .pagination li a:hover {
				 color: #666;
				 }
				 .pagination li.active a,
				 .pagination li.active a.page-link {
				 background: #03A9F4;
				 }
				 .pagination li.active a:hover {
				 background: #0397d6;
				 }
				 .pagination li.disabled i {
				 color: #ccc;
				 }
				 .pagination li i {
				 font-size: 16px;
				 padding-top: 6px
				 }
				 .hint-text {
				 float: left;
				 margin-top: 10px;
				 font-size: 13px;
				 }
				 /* Modal styles */
				 .modal .modal-dialog {
				 max-width: 400px;
				 }
				 .modal .modal-header,
				 .modal .modal-body,
				 .modal .modal-footer {
				 padding: 20px 30px;
				 }
				 .modal .modal-content {
				 border-radius: 3px;
				 font-size: 14px;
				 }
				 .modal .modal-footer {
				 background: #ecf0f1;
				 border-radius: 0 0 3px 3px;
				 }
				 .modal .modal-title {
				 display: inline-block;
				 }
				 .modal .form-control {
				 border-radius: 2px;
				 box-shadow: none;
				 border-color: #dddddd;
				 }
				 .modal textarea.form-control {
				 resize: vertical;
				 }
				 .modal .btn {
				 border-radius: 2px;
				 min-width: 100px;
				 }
				 .modal form label {
				 font-weight: normal;
				 }
			</style>
	 </head>
	 <body>
			<div class="container-xl">
				 <div class="table-responsive">
						<div class="table-wrapper">
							 <div class="table-title">
									<div class="row">
										 <div class="col-sm-6">
												<h2>Manage <b>Customer Account</b></h2>
										 </div>
										 <a href="#addCustomerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a>
										 <!--           <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>	 -->
									</div>
							 </div>
							 <table class="table table-striped table-hover">
									<thead>
										 <tr>
												<th>First Name</th>
												<th>Last Name</th>
												<th>User name</th>
												<th>Actions</th>
										 </tr>
									</thead>
									<tbody>
										 <?php
$serverName = "zoodbteam15-server.mysql.database.azure.com";
$username = "zooadmin";
$password = "Lovec++123";

/*$serverName = "localhost";
$username   = "root";
$password   = "";*/

$conn = new mysqli($serverName, $username, $password, "uh_zoo");
if ($conn == false) {
    die("Connection failed: " . $conn->connect_error);
}
$sql    = "SELECT * FROM Customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["user_name"] . "</td>";
        echo '<td> <a href="#editCustomerModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> ' . " " . '<a href="admin2customer.php?delete=' . $row["customer_id"] . '" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a><div id="editCustomerModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><form method="post"><div class="modal-header"><h4 class="modal-title">Edit Customer</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div><div class="modal-body"><div class="form-group"><label>First Name</label><input type="text" name="efirst" class="form-control" required value="' . $row['first_name'] . '"></div><div class="form-group"><label> Last Name</label><input type="text" name="elast" class="form-control" required value="' . $row['last_name'] . '"></div><div class="form-group"><label>User name</label><input type="text" name="eusername" class="form-control" required value="' . $row['user_name'] . '"></div><div class="form-group"><label>Email</label><input type="text" name="eemail" class="form-control" required value="' . $row['email'] . '"></div><div class="form-group"><label>Password</label><input type="text" name="epw" class="form-control" required value="' . base64_decode($row['pass_word']) . '"><input type="hidden" name="eid" class="form-control" value="' . $row['customer_id'] . '"></div></div><div class="modal-footer"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"><input type="submit" class="btn btn-info" value="Save"></div></form></div></div></div></td></tr>';
    }
}
// if($qry->rows > 0){
//     while($reslt=mysqli_fetch_array($qry)){
//     echo $reslt[0];
//     }
// }
mysqli_close($conn);
//die(mysqli_error($conn));
?>
										 <!--
												<td>Thomas Hardy</td>
												<td>thomashardy@mail.com</td>
												<td>(171) 555-2222</td>
												<td> -->
									</tbody>
							 </table>
						</div>
				 </div>
			</div>
			<!-- ADD CUSTOMER Modal HTML -->
			<
			<div id="addCustomerModal" class="modal fade">
				 <div class="modal-dialog">
						<div class="modal-content">
							 <form method="post">
									<div class="modal-body">
										 <div class="form-group">
												<label> First Name</label>
												<input type="text" name=first class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Last Name</label>
												<input type="last_name" name=last class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>User name</label>
												<input type="user_name" name=user class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Password</label>
												<input type="pass_word" name=pw class="form-control" required>
										 </div>
									</div>
									<div class="modal-footer">
										 <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
										 <button type="submit" class="btn btn-success" value="Add"></button>
									</div>
							 </form>
						</div>
				 </div>
			</div>
			<!-- Edit Modal HTML -->
			<!-- <div id="editCustomerModal" class="modal fade">
				 <div class="modal-dialog">
						<div class="modal-content">
							 <form method="post">
									<div class="modal-header">
										 <h4 class="modal-title">Edit Customer</h4>
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										 <div class="form-group">
												<label>First Name</label>
												<input type="text" name="efirst" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label> Last Name</label>
												<input type="text" name="elast" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>User name</label>
												<input type="email" name="eemail" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Email</label>
												<input type="text" name="eemail" class="form-control" required>
										 </div>
										 <div class="form-group">
												<label>Password</label>
												<input type="text" name="epw" class="form-control" required>
										 </div>
									</div>
									<div class="modal-footer">
										 <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
										 <input type="submit" class="btn btn-info" value="Save">
									</div>
							 </form>
						</div>
				 </div>
			</div> -->
	 </body>
</html>
<?php
//add to customer table
if (isset($_POST['first'])) {
    $first = $_POST['first'];
    $last  = $_POST['last'];
    $user  = $_POST['user'];
    $pw    = $_POST['pw'];

    $conn = new mysqli($serverName, $username, $password, "uh_zoo");
    if ($conn == false) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Customer (first_name, last_name, user_name, pass_word) VALUES ('$first', '$last', '$user', '$pw')";
    if ($conn->query($sql) == true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

//edit customer table
if (isset($_POST['efirst'])) {
    $efirst    = $_POST['efirst'];
    $elast     = $_POST['elast'];
    $eusername = $_POST['eusername'];
    $eemail    = $_POST['eemail'];
    $epw       = base64_encode($_POST['epw']);
    $eid        = $_POST['eid'];

    $conn = new mysqli($serverName, $username, $password, "uh_zoo");
    if ($conn == false) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `customer` SET `first_name`='$efirst',`last_name`='$elast',`user_name`='$eusername',`email`='$eemail',`pass_word`='$epw' WHERE `customer_id`='$eid'";
    if ($conn->query($sql) == true) {
        $to_email  = $eemail;
        $mail_body = "Dear <b>" . $efirst . ' ' . $elast . "</b>,<br><br>You have updted your profile.<br><br><b>Team UH Zoo</b>";
        $subject   = "Registration";
        $mail_head = "Registration Email";
        $headers   = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: UH Zoo <no-reply@uhzoo.com>' . "\r\n";
        'Reply-To: ' . $eemail . '' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $send_mail = mail($to_email, $subject, $mail_body, $headers);
        if ($send_mail) {
            echo "Record updated successfully!";
        } else {
            echo "Unable to send an email!";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

//remove from customer table
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $conn = new mysqli($serverName, $username, $password, "uh_zoo");
    if ($conn == false) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM Customer WHERE customer_id = '$id'";
    if ($conn->query($sql) == true) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>