<?php
include('../db/config.php');

if(isset($_GET['team_code'])) {
    $team_code = $_GET['team_code'];

    $sql = "SELECT * FROM teams WHERE team_code = '$team_code'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
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
    <title>Create Team</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
    <button onclick="history.go(-1)"><i class="material-icons left">arrow_back</i></button>
        <h1><?php echo $team['team_name'] ?></h1>
    </header>
    <main>
        <form action="../process.php" method="post">
            <label for="team_name">Team Name: </label>
            <input type="text" name="team_name" id="team_name">
            <label for="team_description">Team Description: </label>
            <input type="text" name="team_description" id="team_description">
            <label for="team_code">Create Team Code: </label>
            <input type="text" name="team_code" id="team_code" placeholder="4-6 characters">
            <input type="submit" value="Create Team" name="create_team_button">
        </form>
    </main>
</body>

</html>
