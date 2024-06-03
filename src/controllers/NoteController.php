<?php
include_once ('../models/Note.php');
include_once ('../models/User.php');

class NoteController
{
  public function new_note()
  {
    if (isset($_POST['new_note'])) {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $user_id = $_POST['user_id'];

      $note = Note::create($title, $content, $user_id);

      if ($note) {
        header('Location: ../views/home.php?success=created');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function update_note()
  {
    if (isset($_POST['update_note'])) {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $id = $_POST['update_note'];

      $note = Note::update($title, $content, $id);

      if ($note) {
        header('Location: ../views/home.php?success=updated');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function delete_note()
  {
    if (isset($_GET['delete_note'])) {
      $id = $_GET['delete_note'];

      $note = Note::delete($id);

      if ($note) {
        header('Location: ../views/home.php?success=deleted');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function add_collab()
  {
    if (isset($_POST['add_collab'])) {
      $note_id = $_POST['add_collab'];
      $collab_email = $_POST['collab_email'];

      $user_id = User::getId($collab_email);

      if (!$user_id) {
        header('Location: ../views/home.php?error=email_not_found');
        exit;
      }

      $add_collab = Note::addCollab($note_id, $user_id);

      if ($add_collab) {
        header('Location: ../views/home.php?success=new_collaborator_added');
      } else {
        header('Location: ../views/home.php?error=failed_add_collab');
      }
    }
  }
}

$noteController = new NoteController();
$noteController->new_note();
$noteController->update_note();
$noteController->delete_note();
$noteController->add_collab();
