<?php

class User
{
  public static function getAll($id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_assoc();
  }

  public static function create($name, $email, $password)
  {
    include ('../config/db.php');

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function authenticate($email, $password)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = $result->fetch_assoc()) {
      if (password_verify($password, $user['password'])) {
        return $user;
      }
    }

    return false;
  }

  public static function getId($query)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $query);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = $result->fetch_assoc()) {
      return $user['id'];
    }

    return false;
  }
}
