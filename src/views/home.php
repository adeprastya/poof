<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./auth.php?error=unauthenticated");
  exit();
}

include_once ('../models/User.php');
include_once ('../models/Note.php');
include_once ('../components/Header.php');
include_once ('../components/Note.php');
include_once ('../components/AddCollabModal.php');
include_once ('../components/UpdateModal.php');
include_once ('../components/PopUp.php');
include_once ('../components/ReminderModal.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">

    <script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
  </head>

  <body>
    <?= Headers("home") ?>

    <main>
      <div class="container">
        <form class="new-note-form" action="../controllers/NoteController.php" method="POST">
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
            echo Note($note, $_SESSION['user_id']);
          }
        }
        ?>
      </div>
    </main>


    <?php
    if (isset($_GET['reminder']))
      echo ReminderModal($_GET['reminder']);

    if (isset($_GET['update_note']))
      echo UpdateModal($_GET['update_note']);

    if (isset($_GET['add_collab']))
      echo AddCollabModal($_GET['add_collab']);

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