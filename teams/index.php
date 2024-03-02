<?php
session_start();
include('../db/config.php');

if (isset($_GET['team_code'])) {
    $team_code = $_GET['team_code'];
    $_SESSION['team_code'] = $team_code;

    $sql = "SELECT * FROM teams WHERE team_code = '$team_code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $team = mysqli_fetch_assoc($result);
    } else {
        echo "Team not found.";
        header('Location: ../');
    }
} else {
    echo "Team code not provided.";
}
?>

<?php


if (!isset($_SESSION['active_user'])) {
    header("Location: ../auth/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $team_code ?></title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <button onclick="history.go(-1)"><i class="material-icons left">arrow_back</i></button>
        <h1><?php echo $team['team_name'] ?></h1>
    </header>
    <main>
        <section>
            <?php
            include('../components/teams/pending_tasks.php');
            include('../components/teams/overdue_tasks.php');
            ?>
            <?php
            $sql = "SELECT * FROM tasks 
            JOIN user_teams ON tasks.team_code = user_teams.team_code 
            WHERE user_teams.user_id = '$user_id' AND tasks.status = 1 
            AND tasks.team_code = '$team_code'; 
            ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="done_tasks">
                <h1>Done Tasks</h1>
                <div class="done_tasks-items">
                    <?php if (mysqli_num_rows($result) > 0) {
                        while ($tasks = mysqli_fetch_assoc($result)) {
                            $task_id = $tasks['id'];
                            echo "<a href='/task_management/crud/tasks/edit_task.php?task_id=$task_id'>" . $tasks['title'] . "</a>";
                        }
                    } else {
                        echo "<p>No Done Tasks yet.</p>";
                    } ?>
                </div>
            </div>
            </div>
            <a href="../crud/tasks/create_task.php?team_code=<?php echo $team['team_code'] ?>" id="create-task">Create Task</a>
        </section>
    </main>
</body>

</html>