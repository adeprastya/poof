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
      header("Location: " . BASE_URL . "/note");
    } else {
      Flasher::setFlash("error", "Wrong email or password");

      header("Location: " . BASE_URL . "/auth");
    }
  }

  public function logup()
  {
    $result = $this->model("User_model")->create($_POST);

    if ($result) {
      Flasher::setFlash("success", "Account created successfully");
    } else {
      Flasher::setFlash("error", "Failed to create account");
    }

    header("Location: " . BASE_URL . "/auth");
  }

  public function logout()
  {
    session_destroy();

    header("Location: " . BASE_URL . "/auth");
  }
}
