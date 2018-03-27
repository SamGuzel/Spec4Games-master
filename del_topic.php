<?php
session_start();
    include_once 'dbconnect.php';
    if (!isset($_GET['tid'])) {
        header('Location: forums.php?delete_error');
    } else {
        $t_id = $_GET['tid'];
        $sql = "DELETE FROM topic WHERE topic.topicid = $t_id";
        mysqli_query($con, $sql);
        header('Location: forums.php?delete_success');
    }
?>
