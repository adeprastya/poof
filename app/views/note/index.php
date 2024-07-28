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

    <?php
    // if (isset($_GET['reminder']))
    //   echo ReminderModal($_GET['reminder']);
    
    // if (isset($_GET['update_note']))
    //   echo UpdateModal($_GET['update_note']);
    
    // if (isset($_GET['add_collab']))
    //   echo AddCollabModal($_GET['add_collab']);
    
    // if (isset($_GET['success']))
    //   echo PopUp("success", $_GET['success']);
    
    // if (isset($_GET['error']))
    //   echo PopUp("error", $_GET['error']);
    ?>

    <!-- <script src="../utils/js/reminder.js"></script> -->
    <script src="<?= BASE_URL ?>/js/home.js"></script>
  </body>

</html>