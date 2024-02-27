<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks</title>
    <link rel="stylesheet" href="./tasks.css">
    <?php
    include('../components/fonts_google.php');
    include('../components/css_reset.php');
    include('../components/css_pages.php');
    ?>
</head>

<body>
    <main>
        <?php
        include('../components/navigation_bar.php');

        ?>
        <div class="column">
            <?php
            include('../components/header.php');
            ?>
            <section>
                <h1>My Tasks</h1>
                <?php
                include('../components/tasks/pending_tasks.php');
                include('../components/tasks/overdue_tasks.php');
                ?>
            </section>
        </div>

    </main>
</body>

</html>