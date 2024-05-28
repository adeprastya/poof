<?php
function Note($note, $type)
{
  switch ($type) {
    case 'NOTE':
      return
        "<style>
          .note {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px 0;
          }
          .note h6 {
            margin: 0 0 10px 0;
            font-size: 18px;
          }
          .note p {
            margin: 0 0 20px 0;
          }
          .note .actions {
            display: flex;
            gap: 10px;
          }
          .note a {
            padding: 10px 20px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
          }
          .note a.add-collab {
            background-color: blue;
          }
          .note a.update {
            background-color: green;
          }
          .note a.delete {
            background-color: red;
          }
        </style>
        <div class='note'>
          <h6>" . htmlspecialchars($note['title']) . "</h6>
          <p>" . htmlspecialchars($note['content']) . "</p>
          <div class='actions'>
            <a class='add-collab' href='../controllers/NoteController.php?add_collab=" . urlencode($note['id']) . "'>Add Collaborator</a>
            <a class='update' href='../controllers/NoteController.php?update_note=" . urlencode($note['id']) . "'>Update</a>
            <a class='delete' href='../controllers/NoteController.php?delete_note=" . urlencode($note['id']) . "'>Delete</a>
          </div>
        </div>";
    default:
      return "";
  }
}
?>
