<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "task_management";

$conn = mysqli_connect($host, $username, $password, $db);
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks 
            JOIN user_teams ON tasks.team_code = user_teams.team_code 
            WHERE user_teams.user_id = '$user_id' AND tasks.status = 0 
            AND tasks.team_code = '$team_code' AND tasks.due_date > NOW(); 
            ";
$result = mysqli_query($conn, $sql);
?>
<div class="pending_tasks">
    <h1>Pending Tasks</h1>

    <div class="pending_tasks-items">
        <?php if (mysqli_num_rows($result) > 0) {
            while ($tasks = mysqli_fetch_assoc($result)) {
                $task_id = $tasks['id'];
                echo "<a href='/task_management/crud/tasks/edit_task.php?task_id=$task_id'><h1>" . $tasks['title'] . "</h1><p>" . $tasks['description'] . "</p><p>Priority: " . $tasks['priority'] . "</p><p>Due Date: " . $tasks['due_date'] . "</p></a>";
            }
        } else {
            echo "<p>No Pending Tasks Yey!</p>";
        } ?>
    </div>
</div>