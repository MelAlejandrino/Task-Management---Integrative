<?php
include('../../db/config.php');
if (isset($_POST['delete_task_button'])) {
    $task_id = $_POST['task_id'];
    $sql = "DELETE FROM `tasks` WHERE `id` = '$task_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../../index.php");
    } else {
        header("Location: ../../tasks.php");
    }
}

