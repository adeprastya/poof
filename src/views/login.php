<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Login</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
  </head>

  <body>
    <h2 class="title">Poof</h2>

    <div class="card">
      <h1>Login</h1>

      <form action="../controllers/UserController.php" method="POST">
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" name="login">LOGIN</button>
      </form>

      <a href="signup.php">Dont have account? Create account</a>
    </div>
  </body>

</html>