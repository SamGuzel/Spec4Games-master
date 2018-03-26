<?php
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
        <div class="row container">
            <div class="col s12 ">
                <div class="card">
                    <div class="card-image"> <img src="assets/image7.jpeg"> <span class="card-title">The life of a minion</span> </div>
                    <div class="card-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus interdum lobortis tellus in volutpat. Nullam suscipit ut sem eget ullamcorper. In elementum auctor volutpat. Mauris velit ipsum, interdum eu scelerisque et, eleifend in odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc a metus at libero malesuada convallis et vel mauris. Donec et velit eros. Suspendisse accumsan lectus elementum felis euismod efficitur. Sed nibh erat, fermentum in varius posuere, interdum sed ante. Vestibulum porttitor suscipit placerat.</p>
                        <p>Sed varius eget diam sed maximus. Vestibulum augue nibh, pharetra vitae vehicula in, suscipit id dolor. Quisque rhoncus scelerisque venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam consectetur eros vel felis ullamcorper, eu tempus urna ultricies. Sed aliquam sed magna vitae tempus. Mauris purus augue, rutrum at mattis id, fringilla at odio. Vivamus at porttitor nulla. Suspendisse dapibus, augue vel bibendum egestas, nisl ex efficitur lorem, ut lobortis leo libero vel elit. Maecenas ultrices nulla sed neque tincidunt egestas.</p>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce vel elit varius, dignissim enim vel, blandit mauris. Donec ut justo rhoncus, congue diam vel, porta lectus. Nam dapibus, velit at congue dapibus, mauris massa vestibulum velit, id convallis mauris velit a erat. Integer aliquet iaculis velit vel maximus. Sed ac malesuada urna. Suspendisse elementum interdum eros ut iaculis. Integer at quam vitae orci volutpat sodales ut vitae sapien. Cras fringilla sapien id enim imperdiet tempus.</p>
                        <p>In auctor sollicitudin lectus vitae posuere. Vestibulum semper, augue ut commodo ultrices, enim lacus auctor neque, ut ultrices orci magna dignissim ante. Sed vitae lacus hendrerit, fermentum leo eu, commodo eros. Cras vitae augue ullamcorper, pharetra metus vel, laoreet velit. Aenean eget turpis et justo maximus aliquam. Sed nec volutpat augue. Donec sollicitudin nisl vitae sagittis elementum. Quisque sit amet nunc eu dolor blandit ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut pulvinar ornare felis rutrum ultrices. Mauris eget lorem sit amet augue ullamcorper ultricies et pellentesque mauris. Curabitur viverra dolor velit, commodo finibus sem mattis eu. Fusce semper dui eu risus ultricies, nec ornare velit euismod. Sed suscipit tellus risus, vel viverra diam blandit at. Proin interdum nulla et urna aliquet faucibus.</p>
                        <p>Mauris odio velit, pellentesque non molestie non, porta id elit. Etiam et tristique quam, eu hendrerit arcu. In hac habitasse platea dictumst. Vestibulum at magna quam. In eget nisl sit amet tortor pretium ullamcorper. Ut sed neque mauris. Fusce mollis sem nec est maximus ullamcorper. Donec a sem ultricies, ullamcorper urna et, ullamcorper ligula. Phasellus ac dolor et nibh tincidunt placerat non nec libero.</p>
                        <p>Maecenas eget justo sed massa imperdiet vulputate vitae non arcu. Morbi nec pulvinar quam. Nulla et dictum ante. Donec mattis ac sapien non blandit. Aenean ac sagittis nisl. Nulla egestas mi mi, eu congue justo hendrerit vitae. Duis tempor odio ut nisl vulputate, at vestibulum ex vulputate. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse ut risus tincidunt, dictum massa rutrum, mollis ante. Nunc vitae accumsan mauris. Donec pulvinar nulla id sapien dictum imperdiet. Aliquam aliquam augue non mi facilisis congue. Ut in pellentesque erat.</p>
                        <p>Ut facilisis sem vel aliquet interdum. Donec ex massa, interdum vitae ultricies a, iaculis vel odio. Phasellus luctus ac lorem eget auctor. Fusce nec eleifend nulla. Sed eu blandit nulla. Vivamus hendrerit magna diam, id sollicitudin odio tempus vitae. Nam sit amet placerat massa. Sed non vehicula purus. Donec vestibulum aliquam erat, ut pretium nunc. Phasellus elementum pretium mauris sed aliquet.</p>
                    </div>
                    <h2 class="center">The ability to comment will be added once PHP database is added</h2>
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
