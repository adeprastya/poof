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
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function delete($id)
  {
    $result = $this->model("Note_model")->delete($id);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function edit()
  {
    $result = $this->model("Note_model")->edit($_POST);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function favorite($id)
  {
    $result = $this->model("Note_model")->setfavorite($id);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function reminder($id)
  {
    $result = $this->model("Reminder_model")->create($id);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }

  public function collab()
  {
    $result = $this->model("Note_model")->setcollab($_POST);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/note");
  }
}
