<?php


function emptyInputSignup($email, $fname, $lname,$user, $pass,$pwdrepeat){
    $result;
    if(empty($email)|| empty($fname)|| empty($lname) || empty($user)|| empty($pass) || empty($pwdrepeat) ){
        $result = true;
    }
    else{ $result = false;}
    return $result;
}

function invalidUID($user){
    $result;
    if(preg_match("/^[a-zA-Z0-9]*$/", $user)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
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

function usertaken($conn, $user, $email){
    $sql = "SELECT * FROM Customer WHERE user_name = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
}

function OpenConnection(){
    $serverName = "cosc3380-zoo.database.windows.net";
    $connectionOptions = array("Database"=>"UH_Zoo_Database",
        "Uid"=>"dhphan3", "PWD"=>"K7EY2kh@ri*oJH9");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false){
    die(FormatErrors(sqlsrv_errors()));
    } else {
    echo("Connection made");
    }
    return $conn;
}













