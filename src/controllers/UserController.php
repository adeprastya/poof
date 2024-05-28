<?php
include_once ('../models/User.php');

class UserController
{
  public function signup()
  {
    if (isset($_POST['signup'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = User::create($name, $email, $password);

      if ($user) {
        header('Location: ../views/login.php?success=created');
      } else {
        header('Location: ../views/signup.php?error=failed');
      }
    }
  }
  public function login()
  {
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = User::authenticate($email, $password);

      if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];

        header('Location: ../views/home.php');
      } else {
        header('Location: ../views/login.php?error=invalid');
      }
    }
  }
}

$userController = new UserController();
$userController->signup();
$userController->login();
