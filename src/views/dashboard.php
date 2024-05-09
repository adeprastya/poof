<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./login.php?error=unauthorized");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Dashboard</title>
  </head>

  <body>
    <h1>Dashboard</h1>

    <h2><?= $_SESSION['user_id'] ?></h2>

    <a href="./logout.php">Logout</a>
  </body>

</html>