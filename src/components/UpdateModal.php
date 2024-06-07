<?php
include_once ('../models/Note.php');

function UpdateModal($note_id)
{
    $note = Note::getData($note_id);

    return '
    <div class="modal update-modal">
        <a href="home.php">x</a>

        <form action="../controllers/NoteController.php" method="POST">
            <div>
                <input type="text" name="title" placeholder="Title" value="' . htmlspecialchars($note['title']) . '">
            </div>

            <div>
                <textarea rows="4" name="content" placeholder="Content">' . htmlspecialchars($note['content']) . '</textarea>
            </div>

            <button type="submit" name="update_note" value="' . $note_id . '">UPDATE NOTE</button>
        </form>
    </div>
    ';
}
