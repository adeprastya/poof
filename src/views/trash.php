<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./login.php?error=unauthorized");
  exit();
}

include_once ('../components/Header.php');
include_once ('../components/Trash.php');
include_once ('../models/User.php');
include_once ('../models/Trash.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Trash</title>
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">
  </head>

  <body>
    <?= Headers("trash") ?>

    <main>
      <h2>Welcome, <?= User::getAll($_SESSION['user_id'])['name'] ?></h2>

      <div class="container">
        <?php
        $trashes = Trash::getAll($_SESSION['user_id']);

        if ($trashes) {
          foreach ($trashes as $trash) {
            echo Trash($trash);
          }
        }
        ?>
      </div>
    </main>

    <script type="module" src="../assets/js/home.js"></script>
  </body>

</html>