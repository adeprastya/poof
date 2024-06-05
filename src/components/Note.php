<?php
include_once ('../models/User.php');

function Note($note, $user_id)
{
  $isCollab = "NOT_COLLABORATOR";

  $note_owner = User::getAll($note['user_id']);

  if ($note['collaborator_id'] != NULL) {
    $collaborators_name = [];
    $collaborators = explode(',', $note['collaborator_id']);
    if (count($collaborators) > 1) {
      foreach ($collaborators as $collaborator_id) {
        $collaborator = User::getAll($collaborator_id);
        if ($collaborator) {
          $collaborators_name[] = $collaborator['name'];
        }
      }
      $isCollab = "COLLABORATOR";
    }

    if ($note_owner['id'] == $user_id) {
      $isCollab = "COLLABORATOR_OWNER";
    }
  }

  switch ($isCollab) {
    case 'NOT_COLLABORATOR':
      return "
        <div class='note'>
          <h6>" . htmlspecialchars($note['title']) . "</h6>

          <p>" . htmlspecialchars($note['content']) . "</p>

          <div class='actions'>
            <a class='add-collab' href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

            <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
          </div>

          <p>" . htmlspecialchars($note['created_at']) . "</p>
        </div>";

    case 'COLLABORATOR':
      return "
        <div class='note'>
          <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

          <h6>" . htmlspecialchars($note['title']) . "</h6>

          <p>" . htmlspecialchars($note['content']) . "</p>

          <div class='actions'>
            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>
          </div>

          <p>" . htmlspecialchars($note['created_at']) . "</p>
        </div>";

    case 'COLLABORATOR_OWNER':
      return "
            <div class='note'>
              <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

              <h6>" . htmlspecialchars($note['title']) . "</h6>

              <p>" . htmlspecialchars($note['content']) . "</p>

              <div class='actions'>
                <a class='add-collab' href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

                <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

                <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
              </div>

              <p>" . htmlspecialchars($note['created_at']) . "</p>
            </div>";
  }
}
