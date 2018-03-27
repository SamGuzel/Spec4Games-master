<?php
session_start();
if (isset($_POST['submit']) && isset($_SESSION['usr_name'])) {
    include_once 'dbconnect.php';

    $seshID = $_SESSION['usr_id'];
    $title = $_POST['g_title'];
    $minspec = $_POST['g_minspec'];
    $recspec = $_POST['g_recspec'];
    $futspec = $_POST['g_futspec'];
    $speclevel = $_POST['g_speclevel'];


                $sql = "INSERT INTO gamelist (name, minspec, recspec, futurespec) VALUES ('$title', ' $minspec', '$recspec', '$futspec', '$speclevel')";
                $result = mysqli_query($con, $sql);
                if ($result = true) {
                  header("Location: addgame.php?=postsuccess");
                    exit();
                } else {
                    echo "Its Broken Pal";
                    exit();
                }
} else {
    header("Location: addgame.php?nopermission");
    exit();
}
?>
