<?php
    include_once 'dbconnect.php';
    if (!isset($_GET['pid'])) {
        header('Location: forums.php?delete_error');
    } else {
        $t_id = $_GET['t_id'];
        $sql = "DELETE FROM topic WHERE topic.id = $t_id";
        mysqli_query($conn, $sql);
        header('Location: forums.php?delete_success');
    }
?>
