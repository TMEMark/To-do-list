<?php

//Funkcije za registraciju

//Funkcija koja provjerava jesu li sva polja za registraciju ispunjena
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

//Funkcija koja provjerava valja li username
function invalidUsername($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Funkcija koja provjerava tocnost lozinke
function passwordConf($password, $passwordConf) {
    if ($password !== $passwordConf){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Funkcija koja provjerava postoji li username u bazi
function usernameExists($conn, $username) {
    $sql = "SELECT *
            FROM users
            WHERE usersUsername = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
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

//Funkcija koja upisuje podatke za registraciju u bazu
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
    exit();
}

//Funkcije za login

//Funkcija koja provjerava jesu li sva polja za login ispunjena
function emptyInputSignin($username, $password) {
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;   
}

//Funkcija koja provjerava ispravnost unešenih podataka za login i pokreće sesiju za usera
function loginUser($conn, $username, $password) {
    $usernameExists = usernameExists($conn, $username);

    if($usernameExists === false) {
        header("location: ../signin/index.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $usernameExists["usersPass_hash"];
    $checkPassword = password_verify($password, $pwdhashed);

    if ($checkPassword === false) {
        header("location: ../signin/index.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersid"];
        $_SESSION["userUsername"] = $usernameExists["usersUsername"];
        header("location: ../index.php");
        exit();
    }
}