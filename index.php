<?php
session_start();
include_once 'dbconnect.php';
include_once 'gravatar.php';
// $sql = "SELECT * FROM user WHERE id = '$_SESSION[login_user]' ";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
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
                    <?php if (isset($_SESSION['usr_id'])) { ?>
				    <li><a class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></a></li>
                    <li><a href="Editdetails.php">Edit Details</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <?php echo get_gravatar($_SESSION['usr_email'],40,'mm','g',true,array())?>
				    <?php } else { ?>
			    	<li><a href="login.php">| Login |</a></li>
				    <li><a href="createusr.php">| Sign Up |</a></li>

				    <?php } ?>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                    <?php if (isset($_SESSION['usr_id'])) { ?>
                        <li><a class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></a></li>
                        <li><a href="Editdetails.php">Edit Details</a></li>
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
        <div class="row container">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image "> <img src="assets/card1.jpeg">
                        <h4 class="center-align">---Spec Finder---</h4> </div>
                    <div class="card-content center">
                        <p> Choose games and be given required components</p>
                    </div>
                    <div class="Card action center"> <a style="color:white" href="gameSelection.php" class="waves-effect waves-light btn black">Begin Spec Recommendations</a> </div>
                </div>
            </div>
            <div>
                <div class="col s12 m6 l4">
                    <div class="card ">
                        <div class="card-image "> <img src="assets/card2.jpg">
                            <h4 class="center-align">---Forums---</h4> </div>
                        <div class="card-content center">
                            <p>Head to the forums and join the discussion </p>
                        </div>
                        <div class="Card action center"> <a style="color:white" href="forums.php" class="waves-effect waves-light btn black">Click To Go To The Forums</a> </div>
                    </div>
                </div>
                <div>
                    <div class="col s12 m6 l4">
                        <div class="card ">
                            <div class="card-image "> <img src="assets/card3.jpeg">
                                <h4 class="center-align">---Help And Support---</h4> </div>
                            <div class="card-content center">
                                <p>If you find an issue please report it</p>
                            </div>
                            <div class="Card action center"> <a style="color:white" href="helpAndSupport.php" class="waves-effect waves-light btn black">Click To Report An Issue</a> </div>
                        </div>
                    </div>
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
