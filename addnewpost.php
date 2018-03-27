<?php
session_start();
if (isset($_POST['submit']) && isset($_SESSION['usr_name'])) {
    include_once 'dbconnect.php';

    $seshID = $_SESSION['usr_id'];
    $title = $_POST['t_title'];
    $content = $_POST['t_content'];

                $sql = "INSERT INTO topic (title, content, post_date, users_id) VALUES ('$title', '$content', NOW(), '$seshID')";
                $result = mysqli_query($con, $sql);
                if ($result = true) {
                  header("Location: NewPost.php?=postsuccess");
                    exit();
                } else {
                    echo "Its Broken Pal";
                    exit();
                }
} else {
    header("Location: add_topic.inc.php?nopermission");
    exit();
}
?>
