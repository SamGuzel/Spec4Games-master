<?php
session_start();
include_once 'dbconnect.php';
include_once 'gravatar.php';
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

        <div class="container">
            <h1 class="header">Who we are!</h1>
            <p>Welcome to Spec4Games. This is a website to allow gamers like you to configure your gaming rigs around the games you want to play. This started from a simple module on a Level 4 Applied Computing course. I initially had to come up with an idea that was informative and therefore chose gaming. I had used other websites to find system requirements and see what my pc could run and have been asked by friends about what components to buy and had to manually look for specs. This is when I came up with the idea to build a website that would centralise all of those steps and here you have it.. Spec4Games!
            </p>
            <div class="row">
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image "> <img src="assets/image1.PNG">
                        </div>


                </div>
            </div>
            <div>
                <div class="col s12 m6 l4">
                    <div class="card ">
                        <div class="card-image "> <img src="assets/image2.png">
                            </div>


                    </div>
                </div>
                <div>
                    <div class="col s12 m6 l4">
                        <div class="card ">
                            <div class="card-image "> <img src="assets/image3.jpeg">
                                 </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="header">Meet the Team</h2>
          <div class="col s12 m3 center-on-small-only">
            <div class="image-container">
              <img class="circle responsive-img" style="height: 250px" src="assets/sam.jpg">
            </div>
          </div>
          <div class="col s12 m9">
            <h4>Sam Guzel</h4>
            <p>Sam is a level 4 HND student studying Computing Science at stafford university, He has a passion for gaming and programming.</p>
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
