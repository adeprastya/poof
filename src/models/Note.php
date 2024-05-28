<?php

class Note
{
  public static function getAll($user_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM note WHERE user_id = ? OR collaborator_id = ?");
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC);
  }

  public static function create($title, $content, $user_id)
  {
    include_once ('../config/db.php');

    $stmt = mysqli_prepare($conn, "INSERT INTO note (title, content, user_id) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function update($title, $content, $id)
  {
    include_once ('../config/db.php');

    $stmt = mysqli_prepare($conn, "UPDATE note SET title = ?, content = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function delete($id)
  {
    include_once ('../config/db.php');

    $stmt = mysqli_prepare($conn, "DELETE FROM note WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

}
