<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./login.php?error=unauthorized");
  exit();
}

include_once ('../models/User.php');
include_once ('../models/Note.php');
include_once ('../components/Header.php');
include_once ('../components/Note.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Home</title>
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">
  </head>

  <body>
    <?= Headers() ?>

    <main>
      <h2>Welcome, <?= User::getAll($_SESSION['user_id'])['name'] ?></h2>

      <div class="container">
        <form action="../controllers/NoteController.php" method="POST">
          <div>
            <input type="text" name="title" id="title" placeholder="Title">
          </div>

          <div>
            <textarea rows="4" type="text" name="content" id="content" placeholder="Content"></textarea>
          </div>

          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

          <button type="submit" name="new_note">NEW NOTE</button>
        </form>

        <?php
        $notes = Note::getAll($_SESSION['user_id']);

        if ($notes) {
          foreach ($notes as $note) {
            echo Note($note, 'NOTE');
          }
        }
        ?>
      </div>
    </main>

    <script type="module" src="../assets/js/home.js"></script>
  </body>

</html>