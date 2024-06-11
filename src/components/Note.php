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

          <div class='info'>" .
        (($note['is_favorite'] == 1) ? "<svg class='favorite' width='15' height='15' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7.22303 0.665992C7.32551 0.419604 7.67454 0.419604 7.77702 0.665992L9.41343 4.60039C9.45663 4.70426 9.55432 4.77523 9.66645 4.78422L13.914 5.12475C14.18 5.14607 14.2878 5.47802 14.0852 5.65162L10.849 8.42374C10.7636 8.49692 10.7263 8.61176 10.7524 8.72118L11.7411 12.866C11.803 13.1256 11.5206 13.3308 11.2929 13.1917L7.6564 10.9705C7.5604 10.9119 7.43965 10.9119 7.34365 10.9705L3.70718 13.1917C3.47945 13.3308 3.19708 13.1256 3.25899 12.866L4.24769 8.72118C4.2738 8.61176 4.23648 8.49692 4.15105 8.42374L0.914889 5.65162C0.712228 5.47802 0.820086 5.14607 1.08608 5.12475L5.3336 4.78422C5.44573 4.77523 5.54342 4.70426 5.58662 4.60039L7.22303 0.665992Z' fill='currentColor'></path></svg>" : "") .

        "<p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>
          </div>

          <div class='note-menu-toggle'> 
            <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
          </div>

          <div class='note-menu'>
            <a href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

            <a href='../controllers/NoteController.php?set_favorite=" . $note['id'] . "'>" . (($note['is_favorite'] == 0) ? "Make Favorite" : "Unfavorite") . "</a>

            <a href='home.php?reminder=" . urlencode($note['id']) . "'>Set Reminder</a>

            <a href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

            <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
          </div>
        </div>";

    case 'COLLABORATOR':
      return "
        <div class='note'>
          <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

          <h6 class='title'>" . htmlspecialchars($note['title']) . "</h6>

          <p class='content'>" . htmlspecialchars($note['content']) . "</p>

          <div class='info'>" .
        (($note['is_favorite'] == 1) ? "<svg class='favorite' width='15' height='15' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7.22303 0.665992C7.32551 0.419604 7.67454 0.419604 7.77702 0.665992L9.41343 4.60039C9.45663 4.70426 9.55432 4.77523 9.66645 4.78422L13.914 5.12475C14.18 5.14607 14.2878 5.47802 14.0852 5.65162L10.849 8.42374C10.7636 8.49692 10.7263 8.61176 10.7524 8.72118L11.7411 12.866C11.803 13.1256 11.5206 13.3308 11.2929 13.1917L7.6564 10.9705C7.5604 10.9119 7.43965 10.9119 7.34365 10.9705L3.70718 13.1917C3.47945 13.3308 3.19708 13.1256 3.25899 12.866L4.24769 8.72118C4.2738 8.61176 4.23648 8.49692 4.15105 8.42374L0.914889 5.65162C0.712228 5.47802 0.820086 5.14607 1.08608 5.12475L5.3336 4.78422C5.44573 4.77523 5.54342 4.70426 5.58662 4.60039L7.22303 0.665992Z' fill='currentColor'></path></svg>" : "") .

        "<p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>
          </div>

          <div class='note-menu-toggle'> 
            <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
          </div>

          <div class='note-menu'>
            <a class='update' href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

            <a href='home.php?reminder=" . urlencode($note['id']) . "'>Set Reminder</a>
          </div>
        </div>";

    case 'COLLABORATOR_OWNER':
      return "
            <div class='note'>
              <p class='collaborators'>Created by: " . htmlspecialchars($note_owner['name']) . ", " . implode(', ', $collaborators_name) . "</p>

              <h6 class='title'>" . htmlspecialchars($note['title']) . "</h6>

              <p class='content'>" . htmlspecialchars($note['content']) . "</p>

              <div class='info'>" .
        (($note['is_favorite'] == 1) ? "<svg class='favorite' width='15' height='15' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7.22303 0.665992C7.32551 0.419604 7.67454 0.419604 7.77702 0.665992L9.41343 4.60039C9.45663 4.70426 9.55432 4.77523 9.66645 4.78422L13.914 5.12475C14.18 5.14607 14.2878 5.47802 14.0852 5.65162L10.849 8.42374C10.7636 8.49692 10.7263 8.61176 10.7524 8.72118L11.7411 12.866C11.803 13.1256 11.5206 13.3308 11.2929 13.1917L7.6564 10.9705C7.5604 10.9119 7.43965 10.9119 7.34365 10.9705L3.70718 13.1917C3.47945 13.3308 3.19708 13.1256 3.25899 12.866L4.24769 8.72118C4.2738 8.61176 4.23648 8.49692 4.15105 8.42374L0.914889 5.65162C0.712228 5.47802 0.820086 5.14607 1.08608 5.12475L5.3336 4.78422C5.44573 4.77523 5.54342 4.70426 5.58662 4.60039L7.22303 0.665992Z' fill='currentColor'></path></svg>" : "") .

        "<p class='created-at'>" . htmlspecialchars($note['created_at']) . "</p>
              </div>

              <div class='note-menu-toggle'> 
                <svg width='20' height='20' viewBox='0 0 15 15' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M5.5 4.625C6.12132 4.625 6.625 4.12132 6.625 3.5C6.625 2.87868 6.12132 2.375 5.5 2.375C4.87868 2.375 4.375 2.87868 4.375 3.5C4.375 4.12132 4.87868 4.625 5.5 4.625ZM9.5 4.625C10.1213 4.625 10.625 4.12132 10.625 3.5C10.625 2.87868 10.1213 2.375 9.5 2.375C8.87868 2.375 8.375 2.87868 8.375 3.5C8.375 4.12132 8.87868 4.625 9.5 4.625ZM10.625 7.5C10.625 8.12132 10.1213 8.625 9.5 8.625C8.87868 8.625 8.375 8.12132 8.375 7.5C8.375 6.87868 8.87868 6.375 9.5 6.375C10.1213 6.375 10.625 6.87868 10.625 7.5ZM5.5 8.625C6.12132 8.625 6.625 8.12132 6.625 7.5C6.625 6.87868 6.12132 6.375 5.5 6.375C4.87868 6.375 4.375 6.87868 4.375 7.5C4.375 8.12132 4.87868 8.625 5.5 8.625ZM10.625 11.5C10.625 12.1213 10.1213 12.625 9.5 12.625C8.87868 12.625 8.375 12.1213 8.375 11.5C8.375 10.8787 8.87868 10.375 9.5 10.375C10.1213 10.375 10.625 10.8787 10.625 11.5ZM5.5 12.625C6.12132 12.625 6.625 12.1213 6.625 11.5C6.625 10.8787 6.12132 10.375 5.5 10.375C4.87868 10.375 4.375 10.8787 4.375 11.5C4.375 12.1213 4.87868 12.625 5.5 12.625Z' fill='currentColor' fill-rule='evenodd' clip-rule='evenodd'></path></svg>
              </div>

              <div class='note-menu'>
                <a href='home.php?update_note=" . urlencode($note['id']) . "'>Update</a>

                <a href='../controllers/NoteController.php?set_favorite=" . $note['id'] . "'>" . (($note['is_favorite'] == 0) ? "Make Favorite" : "Unfavorite") . "</a>

                <a href='home.php?reminder=" . urlencode($note['id']) . "'>Set Reminder</a>

                <a href='home.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>

                <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
              </div>
            </div>";
  }
}
