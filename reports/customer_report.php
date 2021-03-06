
<!DOCTYPE html>
<!-- needs new credentials for new db  -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Customer Reports</title>
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
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
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
table.table tr th, table.table tr td {
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
.pagination li.active a, .pagination li.active a.page-link {
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
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
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

.nameInputContainer{
	display:flex;
	align-items:center;
	justify-content:center;
}
</style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container px-5">
        <a class="navbar-brand" href="../index.php"><b>University of Houston Zoo</b></a>
        <a class="navbar-brand" href="../admin_portal/admin_portal.php">Admin Portal</a>
        <a class="navbar-brand" href="../reports/employee_reports.php">Employee Reports</a>
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#!">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#contact-us">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Customer Portal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Employee Portal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/manager/manager.php">Manager Portal</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>

</head>
<body>
	<form action="customer_report.php" method="post">
		<div class="nameInputContainer">
			<input type"text" name="byname" placeholder="First name or last name"/>
			<input type"text" name="user" placeholder="user name"/>
			<input type"text" name= "dates" placeholder="YYYY-MM-DD"/>
			<button type "submit" name="submit-search">Search</button>

		</div>
		<?php 
		// if(isset($_POST['search'])){
		// 	$searchq = $_POST['search'];
		// 	$searchq =preg_replace("#[^0-9a-z]#i","",$searchq);
		// 	$query = mysql_query("Select * FROM Customer WHERE first_name LIKE '%$searchq%' or last_name LIKE '%$searchq%'") or die("could not search");
		// 	$count = mysql_num_rows($query);
		// 	if($count == 0){
		// 		$output ='There was no search results!';
		// 	}
		// 	else{
		// 		while($row=mysql_fetch_array($query)){
		// 			$fname = $row['first_name'];
		// 			$lname = $row['last_name'];
		// 			$id = $row['customer_id'];
		// 		}
		// 	}
		// }
		?>
</form>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Customer Reports</b></h2>
					</div>
<!-- 					<a href="#addCustomerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Customer</span></a> -->
<!--           <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>	 -->
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>User Name</th>
						<th>Date Added</th>
					</tr>
				</thead>
				<tbody>
					
						<?php
						$serverName = "zoodbteam15-server.mysql.database.azure.com";
						$username ="zooadmin";
						$password= "Lovec++123";
						//$serverName ="http://51.79.49.230/phpmyadmin/index.php?route=/database/structure&server=1&db=uhzoocom_db";
						//$username= "uhzoocom_dev";
						//$password= "hjd9fG9g5x";
						$conn = new mysqli($serverName, $username, $password,"uhzoocom_db");
						if($conn == false){
						  die("Connection failed: " . $conn->connect_error);
						}
						$count=0;
						//$sql="SELECT * FROM Customer WHERE date_added=curdate();";
						// $result = $conn-> query($sql);
           				// if ($result-> num_rows > 0){
              			// 	while($row= $result-> fetch_assoc()){
                        // $count=$count+1;
                		// 		echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["date_added"] . "</td></tr>";
                        // // echo '<td> <a href="#editCustomerModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> ' . " " . '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872i;</></a> </td> </tr>';
              			// 		}
            			// }
						

						if(isset($_POST['submit-search'])){
							$searchq = $_POST['byname'];
							$searchq2= $_POST['user'];
							$searchq3= $_POST['dates'];
							// $searchq =preg_replace("#[^0-9a-z]#i","",$searchq);
							// $searchq2 =preg_replace("#[^0-9a-z]#i","",$searchq2);
							// $searchq3 =preg_replace("#[^0-9a-z]#i","",$searchq3);
							$squery="";
							
							if (!empty($searchq)){
								
								$squery= "Select * FROM Customer WHERE first_name = '$searchq' or last_name = '$searchq'";
							}
							if(!empty($searchq2)){
								if(!empty($squery)){
									$squery=$squery . " and user_name LIKE '$searchq2'";
								}
								else {
									$squery="Select * FROM Customer WHERE user_name LIKE '$searchq2'";
								}
							}
							if(!empty($searchq3)){
								if(!empty($squery)){
									$squery=$squery . " and date_added >='$searchq3'";
								}
								else{
									$squery="Select * FROM Customer WHERE date_added >= '$searchq3'";
								}
							}
							
							if(!empty($squery)){
								echo "For Professor and TA: name searches by exact match with first name or last name
								user name searches by exact user names and dates added searches by that date and beyond.";
								$squery=$squery . ";";
								$query = $conn-> query($squery);
								
								while($row=$query-> fetch_assoc()){
									$fname = $row['first_name'];
									$lname = $row['last_name'];
									$id=$row['user_name'];
									$dd =$row['date_added'];
									$count=$count+1;
									echo "<tr><td>"  . $fname . "</td><td>" . $lname . "</td><td>" . $id . "</td><td>" . $dd . "</td></tr>";
								}
							}
							
						}
						
            			echo "<tr><td>" . "Total Customers in Search " . $count . "</td></tr>"; 
						mysqli_close($conn);
						
						?>
					
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
< <div id="addCustomerModal" class="modal fade"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-body">					
					<div class="form-group">
						<label> First Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="last_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>User name</label>
						<input type="user_name" class="form-control" required>
					</div>
          <div class="form-group">
						<label>Password</label>
						<input type="pass_word" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editCustomerModal" class="modal fade"> <!--this was formerly editEmployeeModal-->
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Customer</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" required>
					</div>
          <div class="form-group">
						<label> Last Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>User name</label>
						<input type="email" class="form-control" required>
					</div>
		
					<div class="form-group">
						<label>Password</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
