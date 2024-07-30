<?php

function reminderModal()
{
    return '
    <div id="reminder-modal" class="modal reminder-modal">
        <button class="close-reminder-modal close">x</button>
        
        <h3>Set Reminder</h3>

        <form action="' . BASE_URL . '/note/reminder" method="POST">
            <div>
                <label for="remind_at">Date and Time:</label>
                <input type="datetime-local" id="remind_at" name="remind_at" required>
            </div>

            <input type="hidden" name="note_id" value="">

            <button type="submit">REMIND ME</button>
        </form>
    </div>
    ';
}
