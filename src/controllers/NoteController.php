<?php
include_once ('../models/Note.php');

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

  public function add_collab(){
    if (isset($_POST['add_collaborator'])) {
      $note_id = $_POST['note_id'];
      $collaborator_id = $_POST['collaborator_id'];

      $note = Note::find($note_id);
      if ($note) {
          $note->collaborators()->attach($collaborator_id);

          header('Location: ../views/home.php?success=collaborator_added');
      } else {
          header('Location: ../views/home.php?error=note_not_found');
      }
  }

  }

  public function update_note()
  {
    if (isset($_GET['update_note'])) {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $id = $_GET['update_note'];

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
}

$noteController = new NoteController();
$noteController->new_note();
$noteController->update_note();
$noteController->delete_note();
