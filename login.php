<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}
include_once 'dbconnect.php';
//check if form is submitted
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['users_id'];
        $_SESSION['usr_name'] = $row['name'];
        $_SESSION['usr_email'] = $row['email'];
        $_SESSION['usr_phone'] = $row['phone'];
        $_SESSION['usr_adminlevel'] = $row['adminlevel'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--My StyleSheet-->
    <link href="css/myStyleSheet.css" type="text/css" rel="StyleSheet" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> </head>

<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/mobilefriendly.js"></script>
    <header>
        <div class="navbar-fixed">
            <nav class="black">
                <div class="container nav-wrapper"> <a href="index.php" class="brand-logo white-text">Spec4Games</a> <a href="#" data-activates="mobile-demo" class="button-collapse "><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down black-text white-text">
                        <li><a class="white-text" href="createusr.php">| Sign Up |</a></li>
                        <li><a class="white-text" href="login.php">| Login |</a></li>

                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a class="black-text" href="createusr.php">Sign Up</a></li>
                        <li><a class="black-text" href="login.php">Login</a></li>

                    </ul>
                </div>
            </nav>
        </div> <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a> <img id="headerbanner" class="responsive-img" src="assets/header.jpeg" style="width: 100%; " /> </header>
    <!-- Tap Target Structure -->
    <div class="tap-target" data-activates="menu">
        <div class="tap-target-content">
            <h5>Title</h5>
            <p>A bunch of text</p>
        </div>
    </div>
    <main>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
        <div class="row">
            <div class="col s6 m3">
                <div class="card large">
                    <div class="card-image"> <img src="assets/userfile.jpeg"> </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6"> <i class="material-icons prefix">email</i>
                    <input placeholder="Enter Correct Email!" id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                    </div>
                    <div class="input-field col m6"> <i class="material-icons prefix">Passwords</i>
                        <input placeholder="Secure Passwords!" id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>

                </div>
            </div>
        </div>
        <div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
        </form>
    </main>
    <footer class="page-footer black">
        <div class="container">
            <div class="row">
                <div class="col s9 offset-s2">
                    <<div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="AboutUs.php">About Us</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3 " href="forums.php">Forums</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="contactme.php">Contact us</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="ReportIssue.php">Report A Problem</a></div>
                </div>
            </div>
            <div class="footer-copyright black">
                <div class="container black"> © 2017 Copyright Text</div>
            </div>
        </div>
    </footer>
</body>
<script>
    $(document).ready(function () {
        $('.button-collapse').sideNav({
            draggable: true
        , });
    });
</script>

</html>
