<?php

if(isset($_POST["submit"])){
    //echo "User logging in...";

    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($user, $pass) !== false){
        header("location: ../LoginPage.php?error=emptyinput");
        exit();
    }


    login2($conn,$user, $pass);

}
else{
    header("location:/..LoginPage.php");
}
