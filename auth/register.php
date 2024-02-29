<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login_register.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Register</title>

</head>

<body>
    <main>
        <section>
            <div class="login-form">
                <div>
                    <p>T-M (Task Management)</p>
                    <h1>Sign up!</h1>
                </div>
                <form action="process.php" method="post">
                    <label for="name">Enter your name:</label>
                    <input type="text" name="name" id="name">
                    <label for="username">Enter your Username</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Enter your Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Sign Up" name="register_button" id="register_button">
                </form>
                <p>Already have an account? <a href="login.php">Sign up!</a></p>
            </div>
        </section>
    </main>
</body>

</html>