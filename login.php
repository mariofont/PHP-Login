<?php

require_once 'config.php';
require_once 'src/Login.php';

session_start();

/* @todo Sanitize these variable */
$username = $_POST['Username'];
$password = $_POST['Password'];

$_SESSION['Active'] = false;
if (isset($_POST['Submit'])) {
    $login = new Login();

    if ($login->checkLogin($username, $password)) {
        /* Success: Set session variables and redirect to protected page */
        $_SESSION['Username'] = $username;
        $_SESSION['Active'] = true;

        header("location:index.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Sign in</title>
</head>
<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        &nbsp;
        <?php
        /* Check if login form has been submitted and authenticated */
        if(isset($_POST['Submit']) && ! $_SESSION['Active']):
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Incorrect information.
        </div>
        <?php
        endif;
        ?>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
