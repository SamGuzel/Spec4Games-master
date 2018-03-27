<?php
session_start();
if (isset($_topic['submit']) && isset($_SESSION['usr_id'])) {
    if ($_SESSION['usr_adminlevel'] > 0) {
        include_once 'dbconnect.php';
        $t_id = mysqli_real_escape_string($conn, $_POST['t_id']);
        $t_title = mysqli_real_escape_string($conn, $_POST['t_title']);
        $t_content = mysqli_real_escape_string($conn, $_POST['t_content']);
        $sql = "UPDATE topic SET title='$t_title', content='$t_content' WHERE topicid=$t_id;";
        // $result = mysqli_query($conn, $sql);
        if (mysqli_query($con, $sql)) {
            header("Location: ../forums.php?edit=success");
            exit();
        } else {
            // header("Location: ../news.php?edit=fail");
            echo "fail";
            exit();
        }
    } else {
        header('Location: ../forums.php?edit_error');
        exit();
    }
} else {
    header('Location: ../forums.php?edit_error');
    exit();
}
 ?>
