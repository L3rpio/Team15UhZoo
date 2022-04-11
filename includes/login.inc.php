<?php

if(isset($_POST["submit"])){
    echo "User logging in";

    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    echo "User logging in.";
    require_once 'functions.inc.php';
    echo "User logging in..";

    if(emptyInputLogin($user, $pass) !== false){
        header("location: ../LoginPage.php?error=emptyinput");
        exit();
    }
    echo "</br>";
    echo "<User logging in...>";

    login2($conn,$user, $pass);
    header("Location: ../?msg=loggedin");

}
else{
    header("location:../LoginPage.php");
}
