<br />
TODO: Add employee login link below
<br />
TODO: Hash the passwords
<br />
TODO: Add a login page template
<br />
<br />
<br />
<br />
<br />
<br />
Zoo Login Portal
<br />
<br />
<br />
<br />
<section class="signup-form">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username...">
        <input type="password" name="password" placeholder="Password...">
        <button type="submit" name="submit">Log in</button>
    </form>
</section>

<a class="btn btn-outline-light btn-lg px-4" href="./EmployeePortal/Login.php">Are you a partner? Click here for the employee login!</a>
<br />
<br />
<br />
<a class="btn btn-outline-light btn-lg px-4" href="index.php">Click here to go back to the main website</a>
<br />


<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>You left one of the fields empty!</p>";
    }
    if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect Login Information!</p>";
    }
}
?>