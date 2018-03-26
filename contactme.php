<?php
session_start();

include_once 'dbconnect.php';
include_once 'gravatar.php';
//set validation error flag as false
$error = false;
//check if form is submitted
//var_dump($_POST['signup']);
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);


	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
    }
    if (!$error) {
		if(mysqli_query($con, "INSERT INTO contactme(name,email,subject,message) VALUES('" . $name . "', '" . $email . "', '" . $subject . "','" . $message . "')")) {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>
<!DOCTYPE.php>

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
            <?php if (isset($_SESSION['usr_id'])) { ?>
            <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
            <li><a href="Editdetails.php">Edit Details</a></li
            <li><a href="logout.php">Log Out</a></li>
            <?php echo get_gravatar($_SESSION['usr_email'],40,'mm','g',true,array())?>
            <?php } else { ?>
            <li><a href="login.php">| Login |</a></li>
            <li><a href="createusr.php">| Sign Up |</a></li>

            <?php } ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
            <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href="Editdetails.php">Edit Details</a></li
                <li><a href="logout.php">Log Out</a></li>
                <?php echo get_gravatar($_SESSION['usr_email'],40,'mm','g',true,array())?>
                <?php } else { ?>
                <li><a href="login.php">| Login |</a></li>
                <li><a href="createusr.php">| Sign Up |</a></li>

                <?php } ?>

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
    <form role="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contactme">
    <div class="container card-content">
            <div class="section">
                <p class="caption">Have a question? Dont hesitate to send us a message. I will be happy to help.</p>
                    <div class="row">

                      <div class="col s12 m6">
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="name" name="name" type="text" value="<?php echo $_SESSION['usr_name']; ?>">
                              <label for="first_name">Name</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="email"  name="email" type="email" value="<?php echo $_SESSION['usr_email']; ?>">
                              <label for="email" class="">Email</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="subject" name="subject" type="text">
                              <label for="website">Subject</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <textarea id="message" name="message" class="materialize-textarea"></textarea>
                              <label for="message">Message</label>
                            </div>
                            <div class="row">
                              <div class="input-field col s12">
                                <button class="btn black waves-effect waves-light right" type="submit" name="submit" id="submitbutton")>Send
                                  <i class="mdi-content-send right"></i>

                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col s12 m6">
                        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                             <li >
                            <div class="collapsible-header"><i class="material-icons">account_circle</i> About Me?</div>
                            <div class="collapsible-body" style="display: none;">
                              <p class="flow-text" >I am a level 4 HND student currently studying computing science at Stafford University in my first year.</p>
                            </div>
                          </li>
                          <li >
                            <div class="collapsible-header"><i class="material-icons">help</i> Need Help?</div>
                            <div class="collapsible-body" style="display: none;">
                              <p class="flow-text" >If help is needed navigate to the Help and Support page where information regrading many issues is located.</p>
                            </div>
                          </li>

                        </ul>
                      </div>

                    </div>
                  </div>
<div class="row">
    <div class="col s12 m6 l4 center-align">
        <a class="btn-floating btn-large waves-effect waves-light" href="https://www.facebook.com/sam.guzel"><img src="assets/facebook.png" class="circle responsive-img">Facebook</a>
        <p>Facebook</p>
    </div>
    <div class="col s12 m6 l4 center-align">
        <a class="btn-floating btn-large waves-effect waves-light" href="https://twitter.com/SamGuzel1"><img src="assets/twitter.png" class="circle responsive-img">Twitter</a>
         <p>Twitter</p>
    </div>
    <div class="col s12 m6 l4 center-align">
        <a class="btn-floating btn-large waves-effect waves-light" href="https://www.instagram.com/samguzel/"><img src="assets/instagram.png" class="circle responsive-img">Instagram</a>
         <p>Instagram</p>
    </div>
</div>
</div>

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
                <div class="container black"> © 2017 Copyright Text </div>
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
<.php>
