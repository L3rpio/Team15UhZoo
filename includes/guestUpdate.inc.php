<?php

session_start();
session_regenerate_id(true);
session_write_close();

if (isset($_POST["update_profile"])) {
$user             = $_SESSION['user_name'];
$entered_pass     = $_POST["entered_pass"];
$new_pass         = $_POST["new_pass"];
$confirm_pass     = $_POST["confirm_pass"];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (mismatchpassword($new_pass, $confirm_pass) !== false) {
    header("location:../GuestProfileEdit.php?error=pwdmissmatch");
    exit();
}

if (checkoldpassword($conn, $user, $entered_pass) !== false) {
    echo "test";
    header("location:../GuestProfileEdit.php?error=oldpasswordwrong");
    exit();
}

updatepassword($conn, $user, $pass);
header("location:../index.php?SuccessUpdatePassword");
exit();

}
else if (isset($_POST["delete_profile"])){
    $user             = $_SESSION['user_name'];
    $entered_pass     = $_POST["entered_pass"];
    $new_pass         = $_POST["new_pass"];
    $confirm_pass     = $_POST["confirm_pass"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (checkoldpassword($conn, $user, $entered_pass) !== false) {
        header("location:../GuestProfileEdit.php?error=oldpasswordwrong");
        exit();
    }

    deleteuser($conn, $user);
    session_unset();
    session_destroy();
    header("location:../index.php?SuccessDelete");
    exit();
}
else{
    header("location:../GuestSignUp.php");
    exit();
}
// $email = $_POST["email"];

    // $fname     = $_POST["fname"];
    // $lname     = $_POST["lname"];
    // $user      = $_POST["username"];
    // $email     = $_POST["email"];
    // $pass      = md5($_POST["password"]);
    // $pwdrepeat = md5($_POST["passwordrepeat"]);

    // require_once 'dbh.inc.php';
    // require_once 'functions.inc.php';


// if(emptyInputSignup($email, $fname, $lname,$user, $pass,$pwdrepeat) !== false){

    // if (emptyInputSignup($fname, $lname, $user, $pass, $pwdrepeat) !== false) {
    //     header("location:../GuestSignUp.php?error=emptyinput");
    //     exit();
    // }
    // if (invalidUID($user) !== false) {
    //     header("location:../GuestSignUp.php?error=invalidUID");
    //     exit();
    // }

    // if (mismatchpassword($pass, $pwdrepeat) !== false) {
    //     header("location:../GuestSignUp.php?error=pwdmissmatch");
    //     exit();
    // }
    // if(bademail($email) !== false){
    //     header("location:../GuestSignUp.php?error=bademail");
    //     exit();
    // }

    // if (usertaken($conn, $user, $email) !== false) {
    //     header("location:../GuestSignUp.php?error=useralreadyexists");
    //     exit();
    // }

    // createUser2($conn, $fname, $lname, $user, $email, $pass);

    /*$insert = createUser2($conn, $fname, $lname, $user, $pass);
if ($insert == true) {

echo "Data insertion success!";
} else {
echo "Insertion Error!";
}*/
// } else {
//     header("location:/..GuestSignUp.php");
//     exit();
// }
// ob_end_clean();

