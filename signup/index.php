<?php
      include_once '../includes/dbh_inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="left-box">

    </div>
    <div class="register-box">
        <form action="../includes/signup_inc.php" method="post">
            <input type="text" name="firstname" placeholder="Frist name...">
            <input type="text" name="lastname" placeholder="Last name...">
            <input type="date" name="birth_date" placeholder="Date of birth...">
            <input type="text" name="username" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Confirm password...">
            <button type="submit" name="submit" class="button">
            Sign up
            </button>
        </form>       
    </div>
    <?php
      if (isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields.</p>";
        }
        else if ($_GET["error"] == "invalidusername") {
            echo "<p>Chose a proper username(*, /, $, ^ are not allowed).</p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Password has to match.</p>";
        }
        else if ($_GET["error"] == "usernamealreadyexists") {
            echo "<p>Username already exists, please chose another username.</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Ups something went wrong. Try again later</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>You successfuly registered to To-do-list.</p>";
        }
      }
    ?>
</body>
</html>