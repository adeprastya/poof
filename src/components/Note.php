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
          <h6 class='title'>" . htmlspecialchars($note['title']) . "</h6>

          <p class='content'>" . htmlspecialchars($note['content']) . "</p>

          <p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>
          
          <div class='note-menu-toggle'> 
            <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
          </div>

          <div class='note-menu'>          
            <a class='add-collab' href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

            <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
          </div>
        </div>";

    case 'COLLABORATOR':
      return "
        <div class='note'>
          <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

          <h6 class='title'>" . htmlspecialchars($note['title']) . "</h6>

          <p class='content'>" . htmlspecialchars($note['content']) . "</p>

          <p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>

          <div class='note-menu-toggle'> 
            <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
          </div>

          <div class='note-menu'>
            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>
          </div>
        </div>";

    case 'COLLABORATOR_OWNER':
      return "
            <div class='note'>
              <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

              <h6 class='title'>" . htmlspecialchars($note['title']) . "</h6>

              <p class='content'>" . htmlspecialchars($note['content']) . "</p>

              <p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>

              <div class='note-menu-toggle'> 
                <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
              </div>

              <div class='note-menu'>
                <a class='add-collab' href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

                <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

                <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
              </div>
            </div>";
  }
}
