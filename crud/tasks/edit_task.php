<?php
include('../../db/config.php');

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];

    $sql = "SELECT * FROM tasks WHERE `id` = '$task_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $tasks = mysqli_fetch_assoc($result);
    } else {
        echo "Team not found.";
        header('Location: ../');
    }
} else {
    echo "Team code not provided.";
}
?>

<?php
session_start();

if (!isset($_SESSION['active_user'])) {
    header("Location: auth/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <button onclick="history.go(-1)"><i class="material-icons left">arrow_back</i></button>
        <h1>Edit a Task</h1>
    </header>
    <main>
        <form action="../process.php" method="post">
            <input type="hidden" name="task_id" value="<?php echo $tasks['id']?>">
            <label for="task_title">Task Name: </label>
            <input type="text" name="task_title" id="task_title" value="<?php echo $tasks['title'] ?>">
            <label for="task_description">Task Description: </label>
            <input type="text" name="task_description" id="task_description" value="<?php echo $tasks['description'] ?>">
            <label for="task_priority">Priority</label>
            <select name="task_priority" id="task_priority">
                <option value="low" <?php if ($tasks['priority'] === 'low') echo 'selected'; ?>>Low</option>
                <option value="medium" <?php if ($tasks['priority'] === 'medium') echo 'selected'; ?>>Medium</option>
                <option value="high" <?php if ($tasks['priority'] === 'high') echo 'selected'; ?>>High</option>
            </select>
            <input type="date" name="due_date" id="due_date" value="<?php echo $tasks['due_date'] ?>">
            <input type="submit" value="Edit Task" name="edit_task_button">
        </form>
    </main>
</body>

</html>