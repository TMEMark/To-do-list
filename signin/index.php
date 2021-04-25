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
    <div class="login-box">
        <h1>Welcome to your daily organiser</h1>
        <p>Let us improve your life</p>
        <form action="../includes/signin_inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
        </form>
        <form action="signin_inc.php" method="post">
        <input type="password" name="pwd" placeholder="Password">
        </form>
        <button type="submit" name="submit" class="button">
            Sing in
        </button>
        <p>Don't have an account ?</p>
        <p>Sing up now and get a hand on your life.</p>
        <a href="../singup/index.php" class="button">Sign up</a>
    </div>
</body>
</html>