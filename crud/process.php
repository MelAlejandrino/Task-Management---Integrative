<?php
session_start();
$user_id = $_SESSION['user_id'];
$current_team = $_SESSION['team_code'];
include('../db/config.php');

if (isset($_POST['create_team_button'])) {
    $team_name = $_POST['team_name'];
    $team_description = $_POST['team_description'];
    $team_code = $_POST['team_code'];


    $sql = "SELECT team_name, team_code FROM `teams` WHERE team_name = '$team_name' OR team_code = '$team_code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: teams/create_team.php");
    } else {
        $sql = "INSERT INTO `teams` (`team_name`, `team_description`, `team_code`) VALUES ('$team_name', '$team_description', '$team_code')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql = "INSERT INTO `user_teams` (`team_code`, `user_id`) VALUES ('$team_code', '$user_id')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../teams.php");
            } else {
                header("Location: teams/create_team.php");
            }
        } else {
            header("Location: teams/create_team.php");
        }
    }
}

if (isset($_POST['create_task_button'])) {
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $priority = $_POST['task_priority'];
    $due_date = $_POST['due_date'];


    $sql = "INSERT INTO `tasks` (`title`, `description`, `priority`, `due_date`, `team_code`, `user_id`) VALUES ('$task_title', '$task_description', '$priority', '$due_date', '$current_team', '$user_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../index.php");
    } else {
        header("Location: ../tasks.php");
    }
}
if (isset($_POST['edit_task_button'])) {
    $task_id = $_POST['task_id'];
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $priority = $_POST['task_priority'];
    $due_date = $_POST['due_date'];


    $sql = "UPDATE `tasks` SET `title` = '$task_title', `description` = '$task_description', `priority` = '$priority', `due_date` = '$due_date' WHERE `id` = '$task_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../index.php");
    } else {
        header("Location: ../tasks.php");
    }
}

if(isset($_POST['done_task_button'])){
    $task_id = $_POST['task_id'];
    $sql = "UPDATE `tasks` SET `status` = 1 WHERE `id` = '$task_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../index.php");
    } else {
        header("Location: ../tasks.php");
    }
}

if(isset($_POST['join_team_button'])){
    $team_code = $_POST['team_code'];
    $sql = "INSERT INTO `user_teams` (`team_code`, `user_id`) VALUES ('$team_code', '$user_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:../teams.php");
    } else {
        header("Location:../index.php");
    }
}
