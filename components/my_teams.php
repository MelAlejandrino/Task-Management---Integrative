<div class="my_teams">
    <h1>My Teams</h1>
    <div class="my_teams-items">
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "task_management";
        
        $conn = mysqli_connect($host, $username, $password, $db);
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT t.team_name, t.team_description, t.team_code FROM teams t JOIN user_teams u ON t.team_code = u.team_code AND u.user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p><a href="http://localhost/task_management/teams/?team_code=' . $row["team_code"] . '">' . $row["team_name"] . '</a></p>';
            }
        } else {
            echo '<p>You don\'t have a team yet</p>';
        }
        ?>
    </div>
    <div class="teams-buttons">
        <a href="./crud/teams/create_team.php">Create Team</a>
        <a href="./crud/teams/join_team.php">Join Team</a>
    </div>
</div>