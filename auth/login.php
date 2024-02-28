<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <section>
            <div class="login-form">
                <div>
                    <p>T-M (Task Management)</p>
                    <h1>Sign in</h1>
                </div>
                <form action="process.php" method="post">
                    <label for="username">Enter your Username</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Enter your Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Sign In!" name="login_button" id="login_button">
                </form>
                <p>Don't have an account yet? <a href="register.php">Sign in!</a></p>
            </div>
        </section>
    </main>
</body>
</html>