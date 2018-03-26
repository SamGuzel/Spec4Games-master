<?php
include_once 'gravatar.php';
include_once 'dbconnect.php';
session_start();

$usr_id = $_SESSION['usr_id'];

function displayUser($con, $login_user)
{
    $sql    = "SELECT id, name, password, email, phone, adminkey FROM users
    WHERE id = '$login_user' ";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_assoc($result);
    return $row;
}

function updateUser($con, $login_user)
{
    $name      = mysqli_real_escape_string($con, $_POST['name']);
    $email     = mysqli_real_escape_string($con, $_POST['email']);
    $password  = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phone     = mysqli_real_escape_string($con, $_POST['phone']);
    $adminkey  = mysqli_real_escape_string($con, $_POST['adminkey']);

    $sql = "UPDATE users SET name = '$name' , email =
    '$email' , password = '" . md5($password) . "' , phone = '$phone' , adminkey = '$adminkey'  WHERE id = '$login_user' ";
    if (mysqli_query($con, $sql)) {
        $info = "Updated User successfully ";
    } else {
        $info = "Error updating User: " . mysqli_error($con);
    }
    return $info;
}

function deleteUser($con, $login_user)
{
    $sql = "DELETE FROM users WHERE id = '$login_user' ";
    if (mysqli_query($con, $sql)) {
        $info = "User deleted successfully";
        header("Location: login.php");
    } else {
        $info = "Error deleting User: " . mysqli_error($con);
    }
    return $info;
}

if (isset($_POST["update"])) {
    $info = updateUser($con, $_SESSION['usr_id']);
    $row  = displayuser($con, $_SESSION['usr_id']);
    $_SESSION['usr_name'] = $_POST['name'];
    // header('Location: '.$_SERVER['REQUEST_URI']);
} else if (isset($_POST["delete"])) {
    $info = deleteUser($con, $_SESSION['usr_id']);
    // header('Location: '.$_SERVER['REQUEST_URI']);
} else {
    $row = displayUser($con, $_SESSION['usr_id']);
    // header('Location: '.$_SERVER['REQUEST_URI']);
}
mysqli_close($con);
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
        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
            <div class="row">
                <div class="col s6 m3">
                    <div class="card">
                        <div class="card-image"> <img src="assets/userfile.jpeg"> </div>
                    </div>
                </div>
                <div class="input-field col m4"> <i class="material-icons prefix">account_circle</i>
                    <input value="<?php echo $_SESSION['usr_name'] ?>" id="name" name="name" type="text" class="validate">
                    <label for="name">Full Name</label>
                </div>
                <div class="input-field col m4"> <i class="material-icons prefix">Passwords</i>
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="row">
                    <div class="input-field col m4"> <i class="material-icons prefix">Passwords</i>
                        <input id="password" name="cpassword" type="password" class="validate">
                        <label for="password">Re-enter Password</label>
                    </div>
                    <div class="input-field col m4"> <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate" value="<?php echo $_SESSION['usr_email'] ?>">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col m4"> <i class="material-icons prefix">phone</i>
                        <input id="phone" type="text" name="phone" class="validate" value="<?php echo $_SESSION['usr_phone'] ?>">
                        <label for="phone">Contact Number</label>
                    </div>
                    <div class="row m12">

                                <div class="input-field col m3"> <i class="material-icons prefix">Admin</i>
                                    <input id="adminkey" type="password" name="adminkey" class="validate" value="<?php echo $_SESSION['usr_adminkey'] ?>">
                                    <label for="adminkey">Admin Key</label>
                                </div>
                            </div>
                        <input type="submit" name="update" value="Change Details" />

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
