<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["pwd"];

//Konekcija s php fileom za konekciju s bazom i s php fileom s funkcijama

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

//Skripte za funkcije.

    if(emptyInputSignin($username, $password) !== false){
        header("location: ../signin/index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else {
    header("location: ../signin/index.php");
    exit();
}