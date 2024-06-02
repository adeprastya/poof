<?php

class Note
{
  public static function getAll($user_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * FROM note WHERE user_id = ? OR FIND_IN_SET(?, note.collaborator_id)");
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC);
  }

  public static function create($title, $content, $user_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "INSERT INTO note (title, content, user_id) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $user_id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function update($title, $content, $id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "UPDATE note SET title = ?, content = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function delete($id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "DELETE FROM note WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
  }

  public static function addCollab($note_id, $new_collab_id)
  {
    include ('../config/db.php');

    $stmt = mysqli_prepare($conn, "SELECT * from note WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $note_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result->num_rows) {
      return false;
    }

    $note = $result->fetch_assoc();

    $collab_id = explode(',', $note['collaborator_id']);
    $collab_id[] = $new_collab_id;
    $collab_id = implode(',', $collab_id);

    $stmt2 = mysqli_prepare($conn, "UPDATE note SET collaborator_id = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt2, "si", $collab_id, $note_id);
    mysqli_stmt_execute($stmt2);

    if (!$stmt2) {
      return false;
    }

    return mysqli_stmt_affected_rows($stmt2);
  }
}
