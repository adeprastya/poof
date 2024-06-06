<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Login</title>
    <link rel="stylesheet" href="../assets/css/auth.css?v=<?= time() ?>">

    <script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
  </head>

  <body>
    <h2 class="hero">Poof</h2>

    <div class="card" id="login-card">
      <h1>Login</h1>

      <form action="../controllers/UserController.php" method="POST">
        <div>
          <label for="email-login">Email</label>
          <input type="email" name="email" id="email-login" required>
        </div>

        <div>
          <label for="password-login">Password</label>
          <input type="password" name="password" id="password-login" required>
        </div>

        <button type="submit" name="login">LOGIN</button>
      </form>

      <p id="login-anchor">Dont have account? Create account</p>
    </div>

    <div class="card" id="signup-card">
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

        <button type="submit" name="signup">SIGN UP</button>
      </form>

      <p id="signup-anchor">Already have an account? Login</p>
    </div>

    <script src="../assets/js/auth.js"></script>
    <script>
      new kursor({
        type: 4,
        removeDefaultCursor: true,
        color: '#fff'
      })
    </script>
  </body>

</html>