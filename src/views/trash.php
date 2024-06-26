<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./login.php?error=unauthorized");
  exit();
}

include_once ('../components/Header.php');
include_once ('../components/Trash.php');
include_once ('../components/PopUp.php');
include_once ('../models/User.php');
include_once ('../models/Trash.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Trash</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">

    <script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
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

    <?php
    if (isset($_GET['success']))
      echo PopUp("success", $_GET['success']);

    if (isset($_GET['error']))
      echo PopUp("error", $_GET['error']);
    ?>

    <script src="../utils/js/reminder.js"></script>
    <script type="module" src="../assets/js/home.js"></script>
    <script>
      new kursor({
        type: 4,
        removeDefaultCursor: true,
        color: '#000',
      })
    </script>
  </body>

</html>