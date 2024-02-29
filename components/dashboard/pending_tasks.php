<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "task_management";

$conn = mysqli_connect($host, $username, $password, $db);
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks WHERE `user_id` = '$user_id' AND `due_date` > NOW();";
$result = mysqli_query($conn, $sql);
?>
<div class="pending_tasks">
    <h1>Pending Tasks</h1>

    <div class="pending_tasks-items">
        <?php if (mysqli_num_rows($result) > 0) {
            while ($tasks = mysqli_fetch_assoc($result)) {
                $team_code = $tasks['team_code'];
                echo "<a href='./teams/?team_code=$team_code'><p>" . $tasks['title'] . "</p></a>";
            }
        } else {
            echo "<p>No Pending Tasks Yey!</p>";
        } ?>
    </div>
</div>