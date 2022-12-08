<?php
require_once('config.php'); // For storing username and password.

session_start();
?>

<!-- HTML code for Bootstrap framework and form design -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
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

            <?php
            $loop_count = 0;
            /* Check if login form has been submitted */
            if (isset($_POST['Submit'])) {

                //to check if username exsists:
                global $users;
                global $pass;
                $i = 0;
                $_SESSION['password_error'] = false;
                while ($i < count($users)) {
                    if ($_POST['Username'] == $users[$i]) {
                        if ($_POST['Password'] == $pass[$i]) {
                            //redirect to welcome page
                            $_SESSION['Active'] = true;
                            $_SESSION['Username'] = $_POST['Username'];
                            header("location:index.php");
                        } else {
                            //incorrect password
                            $_SESSION['password_error'] = true;

                            echo '<div class="alert alert-danger" role="alert">
                            Password Incorrect
                            </div>';
                            break;
                        }

                        break;
                    }
                    $loop_count++;
                    $i++;
                }
            }
            // Username does not exist
            if (($loop_count == count($users)) and (!$_SESSION['password_error'])) {
                echo '<div class="alert alert-danger" role="alert">
                Username does not exist
              </div>';
            ?>
            <?php
            }
            ?>

        </form>
    </div>



    <!-- bootstarp js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>