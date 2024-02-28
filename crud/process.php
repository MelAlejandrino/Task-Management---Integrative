<?php
session_start();
$user_id = $_SESSION['user_id'];
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
            }
            else{
                header("Location: teams/create_team.php");
            }
        } else {
            header("Location: teams/create_team.php");
        }
    }
}
