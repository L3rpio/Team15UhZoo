<?php

if (isset($_POST["submit"])) {

// $email = $_POST["email"];

    $fname     = $_POST["fname"];
    $lname     = $_POST["lname"];
    $user      = $_POST["username"];
    $email     = $_POST["email"];
    $pass      = md5($_POST["password"]);
    $pwdrepeat = md5($_POST["passwordrepeat"]);

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


// if(emptyInputSignup($email, $fname, $lname,$user, $pass,$pwdrepeat) !== false){

    if (emptyInputSignup($fname, $lname, $user, $pass, $pwdrepeat) !== false) {
        header("location:../GuestSignUp.php?error=emptyinput");
        exit();
    }
    if (invalidUID($user) !== false) {
        header("location:../GuestSignUp.php?error=invalidUID");
        exit();
    }
    if (bademail($email) !== false){
        header("location:../GuestSignUp.php?error=bademail");
        exit();
    }
    if (mismatchpassword($pass, $pwdrepeat) !== false) {
        header("location:../GuestSignUp.php?error=pwdmissmatch");
        exit();
    }
    if (usertaken($conn, $user, $email) !== false) {
        header("location:../GuestSignUp.php?error=useralreadyexists");
        exit();
    }
    createUser2($conn, $fname, $lname, $user, $email, $pass);

    /*$insert = createUser2($conn, $fname, $lname, $user, $pass);
if ($insert == true) {

echo "Data insertion success!";
} else {
echo "Insertion Error!";
}*/
} else {
    header("location:/..GuestSignUp.php");
    exit();
}
// ob_end_clean();

// if(bademail($email) !== false){
//     header("location:../GuestSignUp.php?error=bademail");
//     exit();

// }
