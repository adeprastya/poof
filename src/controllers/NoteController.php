<?php
include_once ('../models/Note.php');
include_once ('../models/Trash.php');
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

      $note_trashed = Note::getData($id);

      Trash::create($note_trashed['type'], $note_trashed['created_at'], $note_trashed['is_favorite'], $note_trashed['title'], $note_trashed['content'], $note_trashed['user_id']);

      $delete = Note::delete($id);
      if ($delete) {
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

  public function set_favorite()
  {
    if (isset($_GET['set_favorite'])) {
      $id = $_GET['set_favorite'];

      $result = Note::setFavorite($id);

      if ($result) {
        header('Location: ../views/home.php?success=favorite_updated');
      } else {
        header('Location: ../views/home.php?error=failed_update_favorite');
      }
    }
  }
}

$noteController = new NoteController();
$noteController->new_note();
$noteController->update_note();
$noteController->delete_note();
$noteController->add_collab();
$noteController->set_favorite();
