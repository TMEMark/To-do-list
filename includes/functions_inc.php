<?php

function emptyInputSignup($firstname, $lastname, $birthdate, $username, $password, $passwordConf) {
    $result;
    if (empty($firstname) || empty($lastname) || empty($birthdate) || empty($username) || empty($password) || empty($passwordConf)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;   
}

function invalidUsername($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordConf($password, $passwordConf) {
    if ($password !== $passwordConf){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username) {
    $sql = "SELECT *
            FROM users
            WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function  createUser($conn, $firstname, $lastname, $birthdate, $username, $password) {
    $sql = "INSERT INTO users (usersFirstname, 	usersLastname, usersBirth_date, usersUsername, 	usersPass_hash)
            VALUES (?, ?, ?, ?, ?);";
     
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/index.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $birthdate, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signin/index.php?error=none");
}