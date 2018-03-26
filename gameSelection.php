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
        </div> <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a> <img id="headerbanner" class="responsive-img" src="assets/header.jpeg" style="width: 100%; " />
        <div class="video-background">
            <div class="video-foreground">
                <iframe id="myplaylist" src="https://www.youtube.com/embed/videoseries?list=PL16CURjfQtegps90lXBa2bz5J0LkbvHyK&amp;controls=0&amp;showinfo=0&autoplay=1&loop=1&mute=1" frameborder="0" volume="0" allowfullscreen></iframe>
            </div>
        </div>
    </header>
    <!-- Tap Target Structure -->
    <div class="tap-target" data-activates="menu">
        <div class="tap-target-content">
            <h5>Title</h5>
            <p>A bunch of text</p>
        </div>
    </div>
    <main>
        <div class="row container ">
            <div class="carousel ">
                <a class="carousel-item " href="#one! "><img src="assets/starc.jpg "></a>
                <a class="carousel-item " href="#two! "><img src="assets/sc2.jpg "></a>
                <a class="carousel-item " href="#three! "><img src="assets/wild.png "></a>
                <a class="carousel-item " href="#four! "><img src="assets/starWars.jpg "></a>
                <a class="carousel-item " href="#five! "><img src="assets/pubg1.jpg "></a>
                <a class="carousel-item " href="#six! "><img src="assets/destiny.jpg "></a>
                <a class="carousel-item " href="#seven! "><img src="assets/league.jpg "></a>
                <a class="carousel-item " href="#eight! "><img src="assets/gta5.jpg "></a>
                <a class="carousel-item " href="#nine! "><img src="assets/mc.jpg "></a>
            </div>
        </div>
        <div class="center">
            <a style="color:black" href="specschosen.php" class="waves-effect waves-light btn white">CLICK TO CONTINUE</a>
        </div>
        <div class="row container ">
            <div class="input-field col s12 m6 white-text ">
                <select class="icons ">
                    <option value=" " disabled selected>Choose Game</option>
                    <option value=" " data-icon="assets/starc.jpg " class="circle ">Star Citizen</option>
                    <option value=" " data-icon="assets/sc2.jpg " class="circle ">Starcraft 2</option>
                    <option value=" " data-icon="assets/wild.png " class="circle ">Wildlands</option>
                </select>
                <label>Choose Game 1</label>
            </div>
            <div class="input-field col s12 m6 white-text ">
                <select class="icons ">
                    <option value=" " disabled selected>Choose Game</option>
                    <option value=" " data-icon="assets/starWars.jpg " class="left circle ">Star Wars Battlefront 2</option>
                    <option value=" " data-icon="assets/pubg1.jpg " class="left circle ">Player Unknown Battlegrounds</option>
                    <option value=" " data-icon="assets/destiny.jpg " class="left circle ">Destiny 2</option>
                </select>
                <label>Choose Game 2</label>
            </div>
            <div class="input-field col s12 m6 white-text">
                <select class="icons ">
                    <option value=" " disabled selected>Destiny 2</option>
                    <option value=" " data-icon="assets/league.jpg " class="left circle ">League Of Legends</option>
                    <option value=" " data-icon="assets/gta5.jpg " class="left circle ">Grand Theft Auto 5</option>
                    <option value=" " data-icon="assets/mc.jpg " class="left circle ">Minecraft</option>
                </select>
                <label>Choose Game 3</label>
            </div>
            <div class="input-field col s12 m6 white-text ">
                <select class="icons">
                    <option value=" " disabled selected>Choose Game</option>
                    <option value=" " data-icon="assets/sample-1.jpg" class="left circle "> League Of Legends</option>
                    <option value=" " data-icon="assets/office.jpg " class="left circle ">Call of Duty WW2</option>
                    <option value=" " data-icon="assets/yuna.jpg " class="left circle ">CS:GO </option>
                </select>
                <label>Choose Game 4</label>
            </div>
            <div class="center">
                <a style="color:black" class="waves-effect waves-light btn white">Add Game (Admin)</a>
            </div>
        </div>
        
    </main>
    <footer class="page-footer black ">
        <div class="container ">
            <div class="row ">
                <div class="col s9 offset-s2 ">
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="AboutUs.php">About Us</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3 " href="forums.php">Forums</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="contactme.php">Contact us</a></div>
                    <div class="col s12 m6 l3"><a class="grey-text text-lighten-3" href="ReportIssue.php">Report A Problem</a></div>
                </div>
            </div>
            <div class="footer-copyright black ">
                <div class="container black "> © 2017 Copyright Text </div>
            </div>
        </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="js/materialize.min.js "></script>
    <script type="text/javascript " src="js/mobilefriendly.js "></script>
    <script>
        var myplaylist = iframe.getElementById('myplaylist');
        myplaylist.mute();
    </script>
</body>
<script>
        $(document).ready(function () {
            $('.button-collapse').sideNav({
                draggable: true
            , });
        });
    </script>

</html>