<?php
include_once ('../models/Note.php');

function ReminderModal($note_id)
{
    return '
    <div class="modal reminder-modal">
        <a href="home.php">x</a>
        <form action="../controllers/ReminderController.php" method="POST">
            <div>
                <label for="remind_at">Set Reminder Date and Time:</label>
                <input type="datetime-local" id="remind_at" name="remind_at" required>
            </div>
            <input type="hidden" name="note_id" value="' . $note_id . '">
            <button type="submit" name="set_reminder" value="' . $note_id . '">SET REMINDER</button>
        </form>
    </div>
    ';
}
?>
