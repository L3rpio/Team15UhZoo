<?php
ob_start();
if(isset($_POST["submit"])){
    echo "User logging in";

    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    echo "User logging in.";
    require_once 'functions.inc.php';
    echo "User logging in..";

    if(emptyInputLogin($user, $pass) !== false){
        echo "Empty user";
        header("location: ../LoginPage.php?error=emptyinput");
        echo "1";
        //header("location: https://team15uhzoo.azurewebsites.net/index.php?msg=loggedin");
        echo "1.5";
        exit();
        echo "2";
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
