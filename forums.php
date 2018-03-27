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
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text black " style="margin-bottom: : 0px"> <span class="card-title">Announcements</span> </div>
                        <div class="card-content white-text grey">
                            <p>Welcome To The Forums. Click A topic to enter and have a read, comment and discuss! - English Comments please (Just to keep it universal), No Racism or talk of Politics - We're here to discuss PC!</p>
                        </div>
                    </div>
                </div> <a class="twitter-timeline" href="https://twitter.com/hashtag/Gaming" data-widget-id="935669741192138753">#Gaming Tweets</a>
                <script>
                    ! function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0]
                            , p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");
                </script>
            </div>
            <main class="container">
	<div class="row">
			<?php
			if (isset($_SESSION['usr_name']) && $_SESSION['usr_adminlevel'] > 0) {
				echo "<a class=\"btn right\" href=\"NewPost.php\">New Post</a>";
			}
			?>
			<div class="col m8 offset-m2">
			<?php
				$sql = "SELECT * FROM topic INNER JOIN users ON topic.users_id=users.users_id ORDER BY topic.post_date DESC";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					$topic ="";
					while ($row = mysqli_fetch_assoc($result)) {
						$t_id = $row['topicid'];
						$t_title = htmlspecialchars($row['title']);
						$t_content = htmlspecialchars($row['content']);
						$t_content = nl2br($t_content);
						$t_content = '<p>' . preg_replace('#(<br />[\r\n]+){2}#', '</p><p>', $t_content) . '</p>';
						$t_user = $row['name'];
						$t_date = $row['post_date'];
						if (isset($_SESSION['usr_name']) && $_SESSION['usr_adminlevel'] > 0) {
							$edit = "
							<a class=\"btn btn-primary\" href=\"del_topic.php?tid=$t_id\">Delete</a>
							<a class=\"btn\" href=\"edit_post_content.php?tid=$t_id\">Edit</a>
							";
						} else {
							$edit ="";
						}
						$topic .= "
									<div class=\"flow-text article-content\">
										<div class=\"row\">
										<div class=\"col m8 left\">
											<h2>$t_title</h2>
										</div>
										<div class=\"col m4 right\">
											<h5 class=\"right-align\">$t_date</h5>
											<h5 class=\"right-align\">$t_user</h5>
										</div>
										</div>
										<div class=\"row\">
										<div>$t_content</div>
										$edit
										</div>
									</div>";
					}
					echo $topic;
				} else {
					echo "No posts found";
				}
			?>
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
