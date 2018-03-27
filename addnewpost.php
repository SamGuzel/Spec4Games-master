<?php
session_start();
if (isset($_POST['submit']) && isset($_SESSION['usr_name']) && $_SESSION['usr_adminlevel'] > 0) {
    include_once 'dbconnect.php';

    $seshID = $_SESSION['usr_id'];
    $title = $_POST['t_title'];
    $content = $_POST['t_content'];

                $sql = "INSERT INTO topic (title, content, users_id, post_date) VALUES ('$title', '$content', '$seshID', NOW())";
                $result = mysqli_query($conn, $sql);
                if ($result = true) {
                    header("Location: NewPost.php?=postsuccess");
                    exit();
                } else {
                    echo "You're a failure!";
                    exit();
                }
} else {
    header("Location: add_topic.inc.php?nopermission");
    exit();
}
