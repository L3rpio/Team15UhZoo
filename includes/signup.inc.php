<?php

ob_start();
if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $pwdrepeat = $_POST["passwordrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

     if(emptyInputSignup($email, $fname, $lname,$user, $pass,$pwdrepeat) !== false){
    //if(emptyInputSignup($fname, $lname,$user, $pass,$pwdrepeat) !== false){
        header("location:../GuestSignUp.php?error=emptyinput");
        die();
        exit();
    }
    if(invalidUID($user) !== false){
        header("location:../GuestSignUp.php?error=invalidUID");
        die();
        exit();
    }

    if(mismatchpassword($pass, $pwdrepeat) !== false){
        header("location:../GuestSignUp.php?error=pwdmissmatch");
        die();
        exit();
    }
    if(usertaken($conn, $user) !== false){
        header("location:../GuestSignUp.php?error=useralreadyexists");
        die();
        exit();
    }
    createUser2($conn, $fname, $lname, $user, $pass, $email);
}
else{
    header("location:/..GuestSignUp.php");
    die();
    exit();
}
ob_end_clean();

    // if(bademail($email) !== false){
    //     header("location:../GuestSignUp.php?error=bademail");
    //     exit();
    // }