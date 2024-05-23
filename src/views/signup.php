<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Sign Up</title>
    <link rel="stylesheet" href="./../css/signup.css?v=<?php echo time(); ?>">
  </head>

  <body>
    <h1>Sign Up</h1>

    <div class="login-div">
    <form action="../controllers/UserController.php" method="POST">
      <div>
        <label for="name">Name</label>
        <input type="name" name="name" id="name">
      </div>

      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>

      <button type="submit" name="signup">SIGN UP</button>
    </form>
  </div>
  </body>

</html>