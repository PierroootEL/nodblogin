<html>
    <head>
        <title>Login without db</title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width, shrink-to-fit=no">
    </head>
    <body>
        <h1>Sign In without having a db setting up</h1>
            <form method="POST" action="login.process.php">
                <label for="username">Your username</label>
                    <input id="username" type="text" name="username" required>
                <label for="password">Your password</label>
                    <input id="password" type="pass" name="password" required>
                <input type="submit" name="login_btn" placeholder="Sign In">
            </form>
    </body>
</html>
