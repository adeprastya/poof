<?php
if (!isset($_SESSION['user_id'])) {
  header("Location: " . BASE_URL . "/auth");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Poof | Note</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/home.css">
  </head>

  <body>
    <?= Flasher::flash() ?>

    <?= navigation("home", $data['user']['name']) ?>

    <main>
      <div class="container">
        <form action="<?= BASE_URL ?>/note/add" method="post" class="new-note-form">
          <div>
            <input type="text" name="title" id="title" placeholder="Title">
          </div>

          <div>
            <textarea rows="4" type="text" name="content" id="content" placeholder="Content"></textarea>
          </div>

          <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

          <button type="submit">NEW NOTE</button>
        </form>

        <?php
        foreach ($data['notes'] as $note) {
          echo note($note);
        }
        ?>
      </div>
    </main>

    <?= editModal() ?>
    <?= collabModal() ?>
    <?= reminderModal() ?>

    <script type="module" src="<?= BASE_URL ?>/js/nav.js"></script>
    <script type="module" src="<?= BASE_URL ?>/js/note.js"></script>
    <script type="module" src="<?= BASE_URL ?>/js/reminder.js"></script>
  </body>

</html>