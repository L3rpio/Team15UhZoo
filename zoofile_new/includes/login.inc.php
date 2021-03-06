<?php
if(isset($_POST["submit"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($user, $pass) !== false){
        header("location: ../LoginPage.php?error=emptyinput");
        exit();
    }

    login2($conn,$user, $pass);
    session_regenerate_id(true);
    session_write_close();
    exit();
}
else{
    header("location: LoginPage.php");
    session_regenerate_id(true);
    session_write_close();
    exit();
}