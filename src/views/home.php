<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ./login.php?error=unauthorized");
  exit();
}

include_once ('../models/User.php');
include_once ('../models/Note.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Home</title>
  </head>

  <body>
    <header>
      <h1>Home</h1>

      <nav>
        <a href="./home.php">Home</a>
        <a href="./trash.php">Trash</a>
      </nav>

      <a href="./logout.php">Logout</a>
    </header>

    <main>
      <h2>Welcome, <?= User::getAll($_SESSION['user_id'])['name'] ?></h2>

      <form action="../controllers/NoteController.php" method="POST">
        <h3>New Note</h3>

        <div>
          <label for="title">Title</label>
          <input type="text" name="title" id="title">
        </div>

        <div>
          <label for="content">Content</label>
          <input type="text" name="content" id="content">
        </div>
    
        <div>
                <label for="shared_user_id">Share with</label>
                <input type="text" name="shared_user_id" id="shared_user_id">
            </div>

        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

        <button type="submit" name="new_note">NEW NOTE</button>
      </form>

      <div>
        <h3>Notes</h3>

        <?php
        $notes = Note::getAll($_SESSION['user_id']);

        if ($notes) {
          foreach ($notes as $note) {
            echo "<div>" . $note['title'] . " - " . $note['content'] .
              "<a href='../controllers/NoteController.php?update_note=" . $note['id'] . "'>Update</a>" .
              "<a href='../controllers/NoteController.php?delete_note=" . $note['id'] . "'>Delete</a>"
              . "</div>";
          }
        } else {
          echo "<div>No notes found</div>";
        }
        ?>
      </div>
    </main>
  </body>

</html>