<?php
include_once ('../models/Trash.php');

class TrashController
{
  public function recover_trash()
  {
    if (isset($_GET['recover_trash'])) {
      $id = $_GET['recover_trash'];

      $recover = Trash::recover($id);

      if ($recover) {
        header('Location: ../views/trash.php?success=recovered');
      } else {
        header('Location: ../views/trash.php?error=failed');
      }
    }
  }

  public function delete_trash()
  {
    if (isset($_GET['delete_trash'])) {
      $id = $_GET['delete_trash'];

      $trash = Trash::delete($id);

      if ($trash) {
        header('Location: ../views/trash.php?success=deleted');
      } else {
        header('Location: ../views/trash.php?error=failed');
      }
    }
  }
}

$trashController = new TrashController();
$trashController->recover_trash();
$trashController->delete_trash();
