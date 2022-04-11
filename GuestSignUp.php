<?php
    function OpenConnection(){
        $serverName = "cosc3380-zoo.database.windows.net";
        $connectionOptions = array("Database"=>"UH_Zoo_Database",
            "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false){
        die(FormatErrors(sqlsrv_errors()));
        } else {
        echo("Connection made");
        }
        return $conn;
    }
?>
Team 15 Zoo Sign Up Portal
<br/>
<br/>
<br/>
<br/>
<section class = "signup-form">
    <form action= "includes/signup.inc.php" method="post">
        <input type="text" name="fname" placeholder="First Name...">
        <input type="text" name="lname" placeholder="Last Name...">
        <input type="text" name="username" placeholder="Username...">
        <input type="text" name="email" placeholder="Email...">
        <input type="password" name="password" placeholder="Password...">
        <input type="password" name="passwordrepeat" placeholder="Repeat password...">
        <button type="submit" name="submit">Sign Up</button>
        <!-- Cust ID
        first_name
        last_name
        user_name
        pass_word -->

    </form>
</section>
<br />
<br />
<a class="btn btn-outline-light btn-lg px-4" href="index.html">Click here to go back to the main website</a>

<?php
    // OpenConnection();
    // $email = $_POST['user'];
    // $password = $_POST['pass'];

?>