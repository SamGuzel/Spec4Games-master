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
        <div class="container">
            <ul class="collapsible " data-collapsible="expandable">
                <li>
                    <div class="collapsible-header"><i class="material-icons">account_circle</i> Trouble logging into your account?</div>
                    <div class="collapsible-body" style="display: none;">
                        <p class="flow-text">Please first try reseting your password, if that does not work please email <a href="mailto:accounthelp@spec4games.com">accounthelp@spec4games.com</a>.</p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">help</i> There is a game you play not on the list of games?</div>
                    <div class="collapsible-body" style="display: none;">
                        <p class="flow-text">Please email <a href="mailto:GameSubmission@spec4games.com">GameSubmission@spec4games.com</a> with a list of minimum and required specs to run the game (official ones only please) with a link to the games website or steam page / download page.</p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">account_circle</i> My photo will not upload?</div>
                    <div class="collapsible-body" style="display: none;">
                        <p class="flow-text">Please make sure it is under 200mb in size and no larger than 800x800. Try uploading it again or report an issue via the issue logger.</p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">help</i> Want to apply to be an admin/mod?</div>
                    <div class="collapsible-body" style="display: none;">
                        <p class="flow-text">Please email  <a href="mailto:Admins@spec4games.com">Admins@spec4games.com</a> with your full name, email, and a reason why we should increase the permission level of your account. WIthin this please summarise your gaming and PC building experience.</p>
                    </div>
                </li>
            </ul>
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