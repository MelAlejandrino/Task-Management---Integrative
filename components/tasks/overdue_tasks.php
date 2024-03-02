<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "task_management";

$conn = mysqli_connect($host, $username, $password, $db);
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks 
JOIN user_teams ON tasks.team_code = user_teams.team_code WHERE user_teams.user_id = '$user_id'
AND tasks.due_date < NOW() AND tasks.status = 0; 
";
$result = mysqli_query($conn, $sql);
?>
<div class="overdue_tasks">
    <h1>Overdue Tasks</h1>
    <div class="overdue_tasks-items">
        <?php if (mysqli_num_rows($result) > 0) {
            while ($tasks = mysqli_fetch_assoc($result)) {
                $team_code = $tasks['team_code'];
                echo "<a href='./teams/?team_code=$team_code'><h1>" . $tasks['title'] . "</h1><p>" . $tasks['description'] . "</p></a>";
            }
        } else {
            echo "<p>No Overdue Tasks Yey!</p>";
        } ?>
    </div>
</div>