<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Organization Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('bd.php');
    session_start();
    if (isset($_POST['name'])) {
        $name = stripslashes($_REQUEST['name']);   
        $name = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `organization` WHERE name='$name'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name'] = $name;
            header("Location: boarddash.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='orglogin.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Organization Login</h1>
        <input type="text" class="login-input" name="name" placeholder="name" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="orgregistration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>
