<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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