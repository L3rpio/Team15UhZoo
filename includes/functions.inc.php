<?php

echo "1";
function emptyInputSignup($email, $fname, $lname,$user, $pass,$pwdrepeat)
{
    $result;
    if(empty($email)|| empty($fname)|| empty($lname) || empty($user)|| empty($pass) || empty($pwdrepeat) )
    {
        $result = true;
    }
    else{ $result = false;}
    return $result;
}
echo "2";
function invalidUID($user){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $user)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
echo "3";
function bademail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
echo "4";
function mismatchpassword($pass, $pwdrepeat) {
    $result;
    if ($pass!== $pwdrepeat)
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

echo "5";
function login2($conn, $user, $pass){
    $query = "SELECT * FROM Customer WHERE user_name='{$user}' AND pass_word='{$pass}';";
    $result = mysqli_query($conn, $query);  
    if($result === false){
        die("Connection failed: " . $conn->connect_error);
    }
    if(mysqli_num_rows($result) != 1)
    {
        header("location: LoginPage.php?error=wronglogin");
        exit();
    }
    else
    {
        echo "User and password matched!";
        #creates sessions
        session_start();
        echo "1";
        //$rows=mysqli_fetch_array($result);

        setcookie("id", "idcookie", time() + 1000000);
        setcookie("first_name", "fnamecookie", time() + 1000000);
        setcookie("last_name", "lnamecookie", time() + 1000000);
        setcookie("user_name", "unamecookie", time() + 1000000);
        // $_SESSION['id'][] = $rows['customer_id'];
        // $_SESSION['first_name'][] = $rows['first_name'];//not sure if this section has been translated to mysql properly
        // $_SESSION['last_name'][] = $rows['last_name'];
        // $_SESSION['user_name'][] = $rows['user_name'];

            // $_SESSION['id'] = $row['customer_id'];
            // $_SESSION['first_name'] = $row['first_name'];
            // $_SESSION['last_name'] = $row['last_name'];
            // $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = 'a';
            $_SESSION['first_name'] = 'b';
            $_SESSION['last_name'] = 'c';
            $_SESSION['user_name'] = 'd';
        // while($row = sqlsrv_fetch_array($result)){
        //     $_SESSION['id'] = $row['customer_id'];
        //     $_SESSION['first_name'] = $row['first_name'];
        //     $_SESSION['last_name'] = $row['last_name'];
        //     $_SESSION['user_name'] = $row['user_name'];
        // }
        echo "2";
        #redirects user
        header("Location: ../index.php?msg=loggedin");
        echo "3";
        session_regenerate_id(true);
        session_write_close();
        exit();
    }
}
echo "6";
// function usertaken2($conn, $user, $email){
//     $sql = "SELECT * FROM Customer WHERE user_name = ? OR Email = ?;";
//     $resultData = sqlsrv_query($conn, $sql); 
//     if(sqlsrv_has_rows($resultData) != 1)
//     {
//         echo "User not created!";
//     }
// }


echo "7";
function createUser2($conn, $fname, $lname, $user, $pass, $email){
    //$sql = "INSERT INTO [dbo].[Customer] (first_name, last_name, user_name, pass_word, Email) VALUES (?, ?, ?, ?, ?) ";
    //$sql = "INSERT INTO [dbo].[Customer] (first_name, last_name, user_name, pass_word, Email) VALUES ($fname, $lname, $user, $pass, $email) ";
    $sql = "INSERT INTO Customer ([first_name],
    [last_name], 
    [user_name],
    [pass_word], 
    [Email]) VALUES ('$fname', '$lname', '$user', '$pass', '$email');";
    $result = mysqli_query($conn, $sql);

    if($result){ echo "Data insertion success!";}
    else{ echo "Insertion Error!";}

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

echo "8";
function emptyInputLogin($user, $pass)
{
    $result;
    if(empty($user)|| empty($pass) )
    {
        $result = true;
    }
    else{ $result = false;}
    return $result;
}
echo "9";
// function usertaken($conn, $user, $email){  //SQLI
//     $sql = "SELECT * FROM Customer WHERE user_name = ? OR Email = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql  )){
//         header("location:/..GuestSignUp.php?error=stmtfailed");
//         exit();
//     }
//     mysqli_stmt_bind_param($stmt, "ss", $user, $email);
//     mysqli_stmt_execute($stmt);
//     $resultData=mysqli_stmt_get_result($stmt);
//     if($row = mysqli_fetch_assoc($resultData)){
//         return $row;
//     }
//     else{
//         $result = false;
//         return $result;
//     }
//     mysqli_stmt_close($stmt);
// }

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

// function OpenConnection(){
//     $serverName = "cosc3380-zoo.database.windows.net";
//     $connectionOptions = array("Database"=>"UH_Zoo_Database",
//         "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
//     $conn = sqlsrv_connect($serverName, $connectionOptions);
//     if($conn == false){
//     die(FormatErrors(sqlsrv_errors()));
//     } else {
//     echo("Connection made");
//     }
//     return $conn;
// }