<?php
      include_once '../includes/dbh_inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="grid">
        <div class="left-box">
            <h1 class="naslov">TO-DO-LIST</h1>
        </div>
        <div class="login-box">
            <h1>Welcome to your daily organiser</h1>
            <p>Let us improve your life</p>
            
            <form action="../includes/signin_inc.php" method="post">
            <div class="username">
                <input type="text" name="username" autocomplete="off">
                <label for="username" class="label-username">
                    <span class="content-username">Username</span>
                </label>
                <br />
            </div>
            <div class="password">
                <input type="password" name="pwd" autocomplete="off">
                <label for="password" class="label-pwd">
                    <span class="content-pwd">Password</span>
                </label>
                <br />
            </div>
            <button type="submit" name="submit" class="button">
                Sing in
            </button>
            </form>
            <div class="signupinfo">
                <p>Don't have an account ?</p>
                <p>
                   <a href="../signup/index.php">Sing up</a> now and get a hand on your life.
                </p>
            </div>
            <div class="footer">
                <span class="name">&#169;Marko Buljan</span>
            </div>
        </div>
    </div>
    <?php
      if (isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields.</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information.</p>";
        }
      }
    ?>
</body>
</html>