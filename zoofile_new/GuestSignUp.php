
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
        <!--We don't have email, for the above code -->
        <input type="password" name="password" placeholder="Password...">
        <input type="password" name="passwordrepeat" placeholder="Repeat password...">
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p style='color:#F00;'>You left one of the fields empty!</p>";
                }
                else if($_GET["error"] == "invalidUID"){
                    echo "<p style='color:#F00;'>Your username has invalid characters!</p>";
                }
                else if($_GET["error"] == "bademail"){
                    echo "<p style='color:#F00;'>Your email is not valid!</p>";
                }
                else if($_GET["error"] == "pwdmissmatch"){
                    echo "<p style='color:#F00;'>Your two passwords do not match!</p>";
                }
                else if($_GET["error"] == "useralreadyexists"){
                    echo "<p style='color:#F00;'>Your user name is taken! Try entering a different username.</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p style='color:#F00;'>You have signed up!</p>";
                }
            }
        ?>
</section>
<br />
<br />
<a class="btn btn-outline-light btn-lg px-4" href="index.php">Click here to go back to the main website</a>

<?php
    // OpenConnection();
    // $email = $_POST['user'];
    // $password = $_POST['pass'];

?>