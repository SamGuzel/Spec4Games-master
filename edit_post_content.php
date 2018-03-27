<?php
session_start();
include_once 'gravatar.php';

if ($_SESSION['usr_adminlevel'] <= 1) {
    header("Location: forums.php?error=nopermission");
}
?>

<?php
    include_once 'dbconnect.php';
    if (!isset($_GET['tid'])) {
        header('Location: forums.php?edit_error');
    } else {
        $t_id = $_GET['tid'];
        $sql = "SELECT * FROM topic WHERE topicid=$t_id";
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $t_title = $row['title'];
                $t_content = $row['content'];
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
          </div>  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a> <img id="headerbanner" class="responsive-img" src="assets/header.jpeg" style="width: 100%; " /> </header>

<!-- SECTIONS -->
<div class="tap-target" data-activates="menu">
    <div class="tap-target-content">
        <h5>Title</h5>
        <p>A bunch of text</p>
    </div>
</div>
<main class="container center-align">


        <form class="col s10 offset-s1" action="edit_topic.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <h1>Edit This Post</h1>

                <div class="input-field">
                    <input hidden type="text" name="t_id" value="<?php echo $t_id; ?>">
                    <input type="text" name="t_title" id="t_title" value="<?php echo $t_title; ?>">
                    <label for="t_title">Post Title</label>
                </div>

                <div class="input-field">
                    <input type="text" name="t_content" class="materialize-textarea" id="t_content" value="<?php echo $t_content; ?>">
                    <label for="t_content">Post Content</label>
                </div>

                <button class="btn black waves-effect waves-light" type="submit" name="submit">Submit
                    <i class="material-icons right">send</i>
                </button>

            </div>
          </div>
        </form>

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
<script type="text/javascript">
    $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');
</script>
</html>
