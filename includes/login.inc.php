<?php
if(isset($_POST["submit"])){
    ob_start();
    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($user, $pass) !== false){
        header("location: LoginPage.php?error=emptyinput");
        die();
        exit();
    }

    login2($conn,$user, $pass);
    session_regenerate_id(true);
    session_write_close();
    die();
    exit();
}
else{
    ob_start();
    header("location: GuestLanding.php");
    session_regenerate_id(true);
    session_write_close();
    die();
    exit();
}
die();
exit();