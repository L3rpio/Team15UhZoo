<?php

if(isset($_POST["submit"])){
    echo "User logging in...";
    sleep(1);
    $name = $_POST["username"];
    $name = $_POST["password"];

}
else{
    header("location:/..GuestSignUp.php");
}
