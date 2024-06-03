<?php
include_once ('../models/User.php');

function Note($note, $user_id)
{
  $type = "NOTE";

  $note_owner = User::getAll($note['user_id']);

  $collaborators = explode(',', $note['collaborator_id']);
  $collaborators_name = [];
  if (count($collaborators) > 1) {
    foreach ($collaborators as $collaborator_id) {
      $collaborator = User::getAll($collaborator_id);
      if ($collaborator) {
        $collaborators_name[] = $collaborator['name'];
      }
    }
    $type = "COLLABORATOR";
  }

  if ($note_owner['id'] == $user_id) {
    $type = "COLLABORATOR_OWNER";
  }

  switch ($type) {
    case 'COLLABORATOR':
      return "
        <div class='note'>
          <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

          <h6>" . htmlspecialchars($note['title']) . "</h6>

          <p>" . htmlspecialchars($note['content']) . "</p>
          
          <div class='actions'>
            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>
          </div>
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
            </div>";

    case 'NOTE':
      return "
        <div class='note'>
          <h6>" . htmlspecialchars($note['title']) . "</h6>

          <p>" . htmlspecialchars($note['content']) . "</p>
          
          <div class='actions'>
            <a class='add-collab' href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

            <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
          </div>
        </div>";
  }
}
