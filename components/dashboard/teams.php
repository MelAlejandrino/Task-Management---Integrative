<div class="teams">
    <h1>My Teams</h1>
    <div class="teams-items">
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
                echo '<a href="http://localhost/task_management/teams/?team_code=' . $row["team_code"] . '"> <h1>' . $row["team_name"] . '</h1></a>';
            }
        } else {
            echo '<p>You don\'t have a team yet</p>';
        }
        ?>
    </div>
</div>