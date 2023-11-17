<?php
//include auth_session.php file on all user panel pages
include("auth_sess.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Organization area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['name']; ?>!</p>
        <p>welcome.</p>
        <p><a href="waste6.php">Proceed into the system</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>