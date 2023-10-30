<?php
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['dlogin'] = $username;
            $_SESSION['id'] = $user_data['id'];
            $uid = $user_data['id'];
            $uip = $_SERVER['REMOTE_ADDR'];
            $status = 1;
            // Code Logs
            $log_query = "INSERT INTO userlog (uid, username, userip, status) VALUES ('$uid', '$username', '$uip', '$status')";
            mysqli_query($con, $log_query);

            header("location: dashboard.php");
            exit; // Exit to prevent further execution
        }
    }

    $uip = $_SERVER['REMOTE_ADDR'];
    $status = 0;
    // You had an undefined variable $uname here, you should use $username
    mysqli_query($con, "INSERT INTO userlog (username, userip, status) VALUES ('$username', '$uip', '$status')");
    $_SESSION['errmsg'] = "Invalid username or password";
    header("location: index.php");
    exit; // Exit to prevent further execution
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>MedLab Admin Login</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <a href="../../index.php">
                    <h2> MedEase | MedLab Admin Login</h2>
                </a>
            </div>

            <div class="box-login">
                <form class="form-login" method="post">
                    <fieldset>
                        <legend>
                            Sign in to your account
                        </legend>
                        <p>
                            Please enter username and password to log in.<br />
                            <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <i class="fa fa-user"></i> </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password" placeholder="Password">
                                <i class="fa fa-lock"></i>
                            </span>
                            <a href="forgot-password.php">
                                Forgot Password ?
                            </a>
                        </div>
                        <div class="form-actions">

                        <a href="register-medlabadmin.php">
                            Create New MedLab Admin
                        </a>

                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>


                    </fieldset>
                </form>

                <div class="copyright">
                    <span class="text-bold text-uppercase"> MedEase Plus Hospital Management System</span>
                </div>

            </div>

        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="assets/js/main.js"></script>

    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>

</body>
<!-- end: BODY -->

</html>