<?php
ob_start();
if(isset($_POST["submit"])){
    echo "User logging in";

    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($user, $pass) !== false){
        header("location: ../LoginPage.php?error=emptyinput");
        exit();
    }
    echo "</br>";
    echo "<User logging in...>";

    login2($conn,$user, $pass);
    //header("Location: https://team15uhzoo.azurewebsites.net/index.php?msg=loggedin");
    echo "<User logging in....>";

}
else{
    header("location: LoginPage.php");
}
ob_end_clean();