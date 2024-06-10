<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Sign Up</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
  </head>

  <body>
    <h2 class="title">Poof</h2>

    <div class="card">
      <h1>Sign Up</h1>

      <form action="../controllers/UserController.php" method="POST">
        <div>
          <label for="name">Name</label>
          <input type="name" name="name" id="name" required>
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>

        <div>
          <label for="confirm password">Password</label>
          <input type="password" name="confirm password" id="confirm password" required>
        </div>

        <button type="submit" name="signup">SIGN UP</button>
      </form>

      <a href="login.php">Already have an account? Login</a>
    </div>
  </body>

</html>