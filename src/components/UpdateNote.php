<?php
function UpdateNote($note) {
    return '
    <div class="container">
        <a href="home.php">x</a>
        <form action="../controllers/NoteController.php" method="POST">
            <div>
                <input type="text" name="title" id="title" placeholder="Title" value="' . htmlspecialchars($note['title']) . '">
            </div>
            <div>
                <textarea rows="4" name="content" id="content" placeholder="Content">' . htmlspecialchars($note['content']) . '</textarea>
            </div>
            <input type="hidden" name="note_id" value="' . htmlspecialchars($note['id']) . '">
            <input type="hidden" name="user_id" value="' . htmlspecialchars($_SESSION['user_id']) . '">
            <button type="submit" name="update_note">UPDATE NOTE</button>
        </form>
    </div>
    ';
}

