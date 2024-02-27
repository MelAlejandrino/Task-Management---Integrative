<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Teams</title>
    <link rel="stylesheet" href="./teams.css">
    <?php
    include('./components/fonts_google.php');
    include('./components/css_reset.php');
    include('./components/css_pages.php');
    ?>
</head>

<body>
    <main>
        <?php
        include('./components/navigation_bar.php');

        ?>
        <div class="column">
            <?php
            include('./components/header.php');
            ?>
            <section>
                <h1>My Teams</h1>
                <?php
                include('./components/teams/my_teams.php');
                ?>
            </section>
        </div>

    </main>
</body>

</html>