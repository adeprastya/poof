<?php

class Trash extends Controller
{
  public function index()
  {
    $data['trashes'] = $this->model("Trash_model")->getAll($_SESSION['user_id']);
    $data['user'] = $this->model("User_model")->get($_SESSION['user_id']);

    $this->view("trash/index", $data);
  }

  public function recover($id)
  {
    $data = $this->model("Trash_model")->get($id);

    $recover = $this->model("Note_model")->create($data);

    $result = $this->model("Trash_model")->delete($id);

    if (!$data || !$recover || !$result) {
      Flasher::setFlash("error", "Failed to recover note");

      header("Location: " . BASE_URL . "/trash");
      exit;
    }

    Flasher::setFlash("success", "Note recovered");
    header("Location: " . BASE_URL . "/trash");
  }

  public function delete($id)
  {
    $result = $this->model("Trash_model")->delete($id);

    if (!$result) {
      Flasher::setFlash("error", "Failed to delete note");

      header("Location: " . BASE_URL . "/trash");
      exit;
    }

    Flasher::setFlash("success", "Note deleted");
    header("Location: " . BASE_URL . "/trash");
  }
}
