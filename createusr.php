<?php
include_once 'gravatar.php';
session_start();
if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}
include_once 'dbconnect.php';
//set validation error flag as false
$error = false;
//check if form is submitted
var_dump($_POST['signup']);
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $adminkey = mysqli_real_escape_string($con, $_POST['adminkey']);

	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,password,phone,adminkey) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "','" . $phone . "','" . $adminkey . "')")) {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
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
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
            <div class="row">
                <div class="col s6 m3">
                    <div class="card">
                        <div class="card-image"> <img src="assets/userfile.jpeg"> </div>
                    </div>
                </div>
                <div class="input-field col m4"> <i class="material-icons prefix">account_circle</i>
                    <input placeholder="Enter First Name" id="name" name="name" type="text" class="validate">
                    <label for="name">Full Name</label>
                </div>
                <div class="input-field col m4"> <i class="material-icons prefix">Passwords</i>
                    <input placeholder="Secure Passwords!" name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="row">
                    <div class="input-field col m4"> <i class="material-icons prefix">Passwords</i>
                        <input placeholder="Dont make it easily guessable!" id="password" name="cpassword" type="password" class="validate">
                        <label for="password">Re-enter Password</label>
                    </div>
                    <div class="input-field col m4"> <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col m4"> <i class="material-icons prefix">phone</i>
                        <input id="phone" type="text" name="phone" class="validate">
                        <label for="phone">Contact Number</label>
                    </div>
                    <div class="row m12">

                                <div class="input-field col m3"> <i class="material-icons prefix">Admin</i>
                                    <input id="adminkey" type="password" name="adminkey" class="validate">
                                    <label for="adminkey">Admin Key</label>
                                </div>
                            </div>
                        <input type="submit" name="signup" value="Sign Up" />

                        </div>
                    </div>
                </div>
                </form>
        </main>
        <footer class="page-footer black">
            <div class="container">
                <div class="row">
                    <div class="col s9 offset-s2">
                        <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="AboutUs.php">About Us</a></div>
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
    </main>
</body>
<script>
    $(document).ready(function () {
        $('.button-collapse').sideNav({
            draggable: true
        , });
    });
</script>

</html>
