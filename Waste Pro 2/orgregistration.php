<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Organization Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('bd.php');
    if (isset($_REQUEST['name'])) {
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $contact_email    = stripslashes($_REQUEST['contact_email']);
        $contact_email    = mysqli_real_escape_string($con, $contact_email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `organization` (name, password, contact_email , create_datetime)
                     VALUES ('$name', '" . md5($password) . "', '$contact_email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='orglogin.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='orgregistration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Organization Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="name" required />
        <input type="text" class="login-input" name="contact_email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="orglogin.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>