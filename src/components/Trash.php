<?php
function Trash($note)
{
  switch ($note['type']) {
    case 'NOTE':
      return "
        <div class='note'>
          <h6>" . htmlspecialchars($note['title']) . "</h6>

          <p>" . htmlspecialchars($note['content']) . "</p>
          
          <div class='actions'>
            <a class='add-collab' href='../controllers/TrashController.php?recover_trash=" . urlencode($note['id']) . "'>Recover</a>

            <a class='delete' href='../controllers/TrashController.php?delete_trash=" . urlencode($note['id']) . "'>Delete</a>
          </div>
        </div>";
  }
}
