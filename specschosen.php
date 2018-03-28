<?php
session_start();
include_once 'dbconnect.php';
include_once 'gravatar.php';

?>
<!DOCTYPE html>
<html>
<?php
$sql = "SELECT * FROM gamelist INNER JOIN users ON gamelist.users_id=users.users_id ORDER BY gamelist.name WHERE gamelist.name == $_selection";
$result = mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
  $topic ="";
  while ($row = mysqli_fetch_assoc($result)) {
    $t_id = $row['gameID'];
    $t_title = htmlspecialchars($row['name']);
    $t_content = htmlspecialchars($row['minspec']);
    $t_content = nl2br($t_content);
    $t_rec = htmlspecialchars($row['recspec']);
    $t_rec = nl2br($t_rec);
    $t_fut = htmlspecialchars($row['futspec']);
    $t_fut = nl2br($t_fut);
    $t_content = '<p>' . preg_replace('#(<br />[\r\n]+){2}#', '</p><p>', $t_content) . '</p>';
    $t_user = $row['name'];
  }
    $topic .= "
    <div class=\"flow-text article-content\">
    <div class=\"row\">
    <div class=\"col left\"></div>
    <div class=\"card-content white-text black \" style=\"margin-bottom: : 0px\"> <span class=\"card-title\"><h2>$t_title</h2></span> </div>
    <div class=\"col m7 right\">
    <h5 class=\"left-align\">$t_date</h5> </div>
    <div class =\"col m7 left-align\">
    <h5 class=\"cent-align black-text\">$t_user</h5> </div>
    </div>
    <div class=\"row\">
    <div class=\"container\">$t_content</div>
    <div class=\"row\">
    <div class=\"container\">$t_rec</div>
    <div class=\"row\">
    <div class=\"container\">$t_fut</div>
    $edit
    </div>
    </div>";
  }
  echo $gamelist;
?>
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
    </div>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="mdi-navigation-menu"></i>
    </a>
    <img id="headerbanner" class="responsive-img" src="assets/header.jpeg" style="width: 100%; " /> </header>
  <!-- Tap Target Structure -->
  <div class="tap-target" data-activates="menu">
    <div class="tap-target-content">
      <h5>Title</h5>
      <p>A bunch of text</p>
    </div>

  </div>
  <main>

  </main>





  <footer class="page-footer black">
    <div class="container">
      <div class="row">
        <div class="col s9 offset-s2">
          <div class="col s12 m6 l3">
            <a class="grey-text text-lighten-3" href="AboutUs.php">About Us</a>
          </div>
          <div class="col s12 m6 l3">
            <a class="grey-text text-lighten-3 " href="forums.php">Forums</a>
          </div>
          <div class="col s12 m6 l3">
            <a class="grey-text text-lighten-3" href="contactme.php">Contact us</a>
          </div>
          <div class="col s12 m6 l3">
            <a class="grey-text text-lighten-3" href="ReportIssue.php">Report A Problem</a>
          </div>
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
