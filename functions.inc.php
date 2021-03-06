<?php
// This script has functions that php pages call

// GuestSignUp.php : If one of the guest sign up field is empty, return true
function emptyInputSignup($fname, $lname, $user, $pass, $pwdrepeat)
{
    $result = '';
    if (empty($fname) || empty($lname) || empty($user) || empty($pass) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// GuestSignUp.php : If the userID has characters that invalid, return true
function invalidUID($user)
{
    $result = '';
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// GuestSignUp.php : If the customer's passwords do not match, return true
function mismatchpassword($pass, $pwdrepeat)
{
    $result = '';
    if ($pass !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// GuestSignUp.php : If a user tries to sign in with the same username that someone else already has
function usertaken($conn, $user)
{
    //SQLI
    //    $sql = "SELECT * FROM Customer WHERE user_name = ? OR Email = ?;"; //This has email
    $sql  = "SELECT * FROM customer WHERE user_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../GuestSignUp.php?error=useralreadyexists");
        exit();
    }
    //mysqli_stmt_bind_param($stmt, "ss", $user, $email);  //This has email too
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

// GuestSignUp.php : Creates a new customer row on the database with the information provided
function createUser2($conn, $fname, $lname, $user, $email, $pass)
{
    //$sql = "INSERT INTO Customer ([first_name], [last_name], [user_name], [pass_word], [Email]) VALUES ('$fname', '$lname', '$user', '$pass', '$email');";
    $sql    = "INSERT INTO `customer`(`first_name`, `last_name`, `user_name`,`email`, `pass_word`) VALUES ('$fname', '$lname', '$user','$email','$pass');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $to_email  = $email;
        $mail_body = "Dear <b>" . $fname . ' ' . $lname . "</b>,<br><br>Thank you for register with UH Zoo.<br><br><b>Team UH Zoo</b>";
        $subject   = "Registration";
        $mail_head = "Registration Email";
        $headers   = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: UH Zoo <no-reply@uhzoo.com>' . "\r\n";
        'Reply-To: ' . $email . '' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $send_mail = mail($to_email, $subject, $mail_body, $headers);
        if ($send_mail) {
            echo "Thank you for registering with us!";
        } else {
            echo "Unable to send an email!";
        }
    } else {
        echo "Insertion Error!";
    }

    /*if($result){
    return true;
    }else{
    return false;
    }*/

    // if($result === false){
    //     die( print_r( sqlsrv_errors(), true));
    //     }
    // if(sqlsrv_has_rows($result) != 1)
    // {
    //     echo "User not created!";
    // }
    // else{
    //     echo "User created!";
    //     header("Location: ../index.html");
    // }
}

// LoginPage.php : Logs a user in using sessions
function login2($conn, $user, $pass)
{
    $query  = "SELECT * FROM Customer WHERE user_name='{$user}' AND pass_word='{$pass}';";
    $result = mysqli_query($conn, $query);
    if ($result === false) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (mysqli_num_rows($result) != 1) {
        header("location: LoginPage.php?error=wronglogin");
        exit();
    } else {
        echo "User and password matched!";
        session_start();
        echo "1";
        $rows                   = mysqli_fetch_array($result);
        $_SESSION['id']         = $rows['customer_id'];
        $_SESSION['first_name'] = $rows['first_name'];
        $_SESSION['last_name']  = $rows['last_name'];
        $_SESSION['user_name']  = $rows['user_name'];

        // while($row = sqlsrv_fetch_array($result)){
        //     $_SESSION['id'] = $row['customer_id'];
        //     $_SESSION['first_name'] = $row['first_name'];
        //     $_SESSION['last_name'] = $row['last_name'];
        //     $_SESSION['user_name'] = $row['user_name'];
        // }
        header("Location: ../index.php?msg=loggedin");
        session_regenerate_id(true);
        session_write_close();
        exit();
    }
}

// LoginPage.php : If a user tries to login with nothing on a field
function emptyInputLogin($user, $pass)
{
    $result = '';
    if (empty($user) || empty($pass)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function createUser($conn, $user, $email, $fname, $lname, $pass){
//     $sql = "INSERT INTO Customer (first_name, last_name, user_name, pass_word) VALUES (?, ?, ?, ?) ";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql  )){
//         header("location:/..GuestSignUp.php?error=stmtfailed");
//         exit();
//     }
//     $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
//     mysqli_stmt_bind_param($stmt, "sssss", $user, $email, $fname, $lname, $hashedPwd);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
//     header("location:/..GuestSignUp.php?error=none");
//     exit();
// }

// // GuestSignUp.php : If the customer has a bad email, return true (Got rid of this, no email)
// function bademail($email) {
//     $result;
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL))
//     {
//         $result=true;
//     }
//     else{
//         $result=false;
//     }
//     return $result;
// }
