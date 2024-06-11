<?php
include_once ('../models/Note.php');

function ReminderModal($note_id)
{
    return '
    <div class="modal reminder-modal">
        <h3>Set Reminder</h3>

        <a href="home.php">x</a>

        <form action="../controllers/ReminderController.php" method="POST">
            <div>
                <label for="remind_at">Date and Time:</label>
                <input type="datetime-local" id="remind_at" name="remind_at" required>
            </div>
            
            <button type="submit" name="set_reminder" value="' . $note_id . '">REMIND ME</button>
        </form>
    </div>
    ';
}
