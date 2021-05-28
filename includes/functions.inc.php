<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat,){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUID($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat){
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sqli = "SELECT * FROM users WHERE usersUid = ? OR usersemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqli)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
        else {
            $result = false;
            return $result;
        }
    mysqli_stmt_close($stmt);
    
}

function createUser($conn, $name, $email, $username, $pwd){
    $sqli = "INSERT INTO users(usersName, usersEmail, usersUID, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqli)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
    
}


function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;

    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser ($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();

    }

    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] =  $uidExists["usersID"];
        $_SESSION["useruid"] =  $uidExists["usersUID"];
        header("location: ../index.php");
        exit();        
    }
}