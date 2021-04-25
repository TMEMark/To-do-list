<?php

if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["birth_date"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $passwordConf = $_POST["pwdrepeat"];

    //Konekcija s php fileom za konekciju s bazom i s php fileom s funkcijama

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    //Funkcije ako user sjebe nesto pri registraciji.

    if (emptyInputSignup($firstname, $lastname, $birthdate, $username, $password, $passwordConf) !== false) {
        header("location: ../signup/index.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: ../signup/index.php?error=invalidusername");
        exit();
    }

    if (passwordConf($password, $passwordConf) !== false) {
        header("location: ../signup/index.php?error=passwordsdontmatch");
        exit();
    }


    if (usernameExists($conn, $username) !== false) {
        header("location: ../signup/index.php?error=usernamealreadyexists");
        exit();
    }

    createUser($conn, $firstname, $lastname, $birthdate, $username, $password);
}
else {
    header("location: ../signup/index.php");
    exit();
}