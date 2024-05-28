<?php
function Note($note, $type)
{
  switch ($type) {
    case 'NOTE':
      return
        "<div class='note'>" .
        "<h6>" . $note['title'] . "</h6>" .
        "<p>" . $note['content'] . "</p>" .
        "<a href='../controllers/NoteController.php?update_note=" . $note['id'] . "'>Update</a>" .
        "<a href='../controllers/NoteController.php?delete_note=" . $note['id'] . "'>Delete</a>" .
        "</div>";
    default:
      return "";
  }
}
