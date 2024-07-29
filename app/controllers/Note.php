<?php

class Note extends Controller
{
  public function index()
  {
    $data['notes'] = $this->model("Note_model")->getAll($_SESSION['user_id']);
    $data['user'] = $this->model("User_model")->get($_SESSION['user_id']);

    $this->view("note/index", $data);
  }

  public function add()
  {
    $result = $this->model("Note_model")->create($_POST);

    if ($result) {
      Flasher::setFlash("success", "Note created");
    } else {
      Flasher::setFlash("error", "Failed to create note");
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function delete($id)
  {
    $temp = $this->model("Note_model")->get($id);
    $trash = $this->model("Trash_model")->create($temp);
    $result = $this->model("Note_model")->delete($id);

    if ($result && $trash) {
      Flasher::setFlash("success", "Note deleted and moved to trash");
    } else {
      Flasher::setFlash("error", "Failed to delete note");
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function edit()
  {
    $result = $this->model("Note_model")->edit($_POST);

    if ($result) {
      Flasher::setFlash("success", "Note updated");
    } else {
      Flasher::setFlash("error", "Failed to update note");
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function reminder()
  {
    $_POST['user_id'] = $_SESSION['user_id'];
    $result = $this->model("Reminder_model")->create($_POST);

    if (!$result) {
      Flasher::setFlash("error", "Failed to set reminder");

      header("Location: " . BASE_URL . "/note");
      exit;
    }

    Flasher::setFlash("success", "New reminder added");
    header("Location: " . BASE_URL . "/note");
  }

  public function collab()
  {
    $collaborator = $this->model("User_model")->getByEmail($_POST['collab_email']);

    if (!$collaborator) {
      Flasher::setFlash("error", "Collaborator not found");

      header("Location: " . BASE_URL . "/note");
      exit;
    }

    $result = $this->model("Note_model")->setcollab($_POST['id'], $collaborator['id']);

    if (!$result) {
      Flasher::setFlash("error", "Failed to add collaborator");

      header("Location: " . BASE_URL . "/note");
      exit;
    }

    Flasher::setFlash("success", "New collaborator added");
    header("Location: " . BASE_URL . "/note");
  }

  public function favorite($id)
  {
    $data = $this->model("Note_model")->get($id);
    $result = $this->model("Note_model")->setfavorite($data);

    if ($result) {
      Flasher::setFlash("success", "Note updated");
    } else {
      Flasher::setFlash("error", "Failed to update note");
    }

    header("Location: " . BASE_URL . "/note");
  }
}
