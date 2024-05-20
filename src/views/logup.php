<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Signup</title>
    <link rel="stylesheet" href="./../css/login.css">

  </head>

  <body>
    <h1>Signup</h1>

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

      <button type="submit" name="logup">SIGNUP</button>
    </form>
  </div>
  </body>

</html>