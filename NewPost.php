<?php
session_start();
include_once 'dbconnect.php';
include_once 'gravatar.php';
if ($_SESSION['usr_adminlevel'] < 1) {
    header("Location: forums.php?error=nopermission");
}
?>

<!DOCTYPE html>
<html>

<head>
    <body>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--My StyleSheet-->
    <link href="css/myStyleSheet.css" type="text/css" rel="StyleSheet" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
				    <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li
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

<main class="container">
    <div class="row">

        <form class="col s10 offset-s1" action="addnewpost.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <h1>Add A New Post</h1>

                <div class="input-field">
                    <input type="text" name="t_title" id="t_title">
                    <label for="p_title">Post Title</label>
                </div>

                <div class="input-field">
                    <textarea name="t_content" class="materialize-textarea" id="textarea1"></textarea>
                    <label for="textarea1">Post Content</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                    <i class="material-icons right">send</i>
                </button>

            </div>
        </form>

    </div>
</main>
</head>
</body>
<script type="text/javascript">
    $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');
</script>

</html>
