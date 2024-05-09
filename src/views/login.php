<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Login</title>
  </head>

  <body>
    <h1>Login</h1>

    <form action="../controllers/UserController.php" method="POST">
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>

      <button type="submit" name="login">LOGIN</button>
    </form>

    <a href="logup.php">Create account</a>
  </body>

</html>