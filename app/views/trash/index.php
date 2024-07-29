<?php
if (!isset($_SESSION['user_id'])) {
  header("Location: " . BASE_URL . "/auth");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Poof | Trash</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/home.css">
  </head>

  <body>
    <?= Flasher::flash() ?>

    <?= navigation("trash", $data['user']['name']) ?>

    <main>
      <div class="container">
        <?php
        foreach ($data['trashes'] as $trash) {
          echo trash($trash);
        }
        ?>
      </div>
    </main>

    <script type="module" src="<?= BASE_URL ?>/js/nav.js"></script>
    <script type="module" src="<?= BASE_URL ?>/js/trash.js"></script>
    <script type="module" src="<?= BASE_URL ?>/js/reminder.js"></script>
  </body>

</html>