
<br />
Team 15 Zoo Login Portal<br />
<br />
Last changed: 12:07 am apr11
<br />
<br />
<section class="signup-form">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username...">
        <input type="password" name="password" placeholder="Password...">
        <button type="submit" name="submit">Log in</button>
        <!-- Cust ID
        first_name
        last_name
        user_name
        pass_word -->

    </form>
</section>
<br />
<br />
<a class="btn btn-outline-light btn-lg px-4" href="index.php">Click here to go back to the main website</a>
<br />
<?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>You left one of the fields empty!</p>";
                }
                if($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect Login Information!</p>";
                }
            }

        ?>
<br />
<br />
Example Logins for Database testing
<table class="nav-justified">
    <tr>
        <td style="height: 21px">Username</td>
        <td style="height: 21px">Password</td>
        <td style="height: 21px">UserType</td>
    </tr>
    <tr>
        <td style="height: 20px">renuk12</td>
        <td style="height: 20px">ILoveCougars123</td>
        <td style="height: 20px">Customer</td>
    </tr>
    <tr>
        <td>SandyRhul</td>
        <td>Apassword</td>
        <td>Customer</td>
    </tr>
    <!-- <tr>
        <td>user3</td>
        <td>3</td>
        <td>Employee</td>
    </tr>
    <tr>
        <td>user4</td>
        <td>4</td>
        <td>Employee</td>
    </tr> -->
</table>
<br />

<!-- 
<?php
//     function OpenConnection(){
//         $serverName = "cosc3380-zoo.database.windows.net";
//         $connectionOptions = array("Database"=>"UH_Zoo_Database",
//             "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
//         $conn = sqlsrv_connect($serverName, $connectionOptions);
//         if($conn == false){
//         die(FormatErrors(sqlsrv_errors()));
//         } else {
//         echo("Connection made");
//         }
//         return $conn;
//     }
// ?> 
-->