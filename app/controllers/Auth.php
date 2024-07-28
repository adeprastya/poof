<?php

class Auth extends Controller
{
  public function index()
  {
    $this->view("auth/index");
  }

  public function login()
  {
    $result = $this->model("User_model")->authenticate($_POST);

    if ($result) {
      // Succes
      header("Location: " . BASE_URL . "/note");
    } else {
      // Error
      header("Location: " . BASE_URL . "/auth");
    }
  }

  public function logup()
  {
    $result = $this->model("User_model")->create($_POST);

    if ($result) {
      // Succes
    } else {
      // Error
    }

    header("Location: " . BASE_URL . "/auth");
  }

  public function logout()
  {
    session_destroy();

    header("Location: " . BASE_URL . "/auth");
  }
}
