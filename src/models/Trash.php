<?php

class Trash
{
  public static function getAll($user_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM trash WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC);
  }

  public static function getData($id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM trash WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result);
  }

  public static function create($type, $created_at, $is_favorite, $title, $content, $user_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "INSERT INTO trash (type, created_at, is_favorite, title, content, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssissi", $type, $created_at, $is_favorite, $title, $content, $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function delete($id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "DELETE FROM trash WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function recover($id)
  {
    include ('../config/db.php');

    $data = self::getData($id);

    echo print_r($data);
    $delete = self::delete($id);

    $stmt = mysqli_prepare($conn, "INSERT INTO note (type, created_at, is_favorite, title, content, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssissi", $data['type'], $data['created_at'], $data['is_favorite'], $data['title'], $data['content'], $data['user_id']);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }
}
