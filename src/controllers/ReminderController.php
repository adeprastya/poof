<?php
require_once '../config/db.php';
require_once '../models/Reminder.php';

class ReminderController
{
    public function create_reminder()
    {
        if (isset($_POST['set_reminder'])) {
            session_start();

            $user_id = $_SESSION['user_id'];
            $note_id = $_POST['set_reminder'];
            $remind_at = $_POST['remind_at'];
            $reminderDateTime = new DateTime($remind_at);
            $formattedDateTime = $reminderDateTime->format('Y-m-d H:i:s');

            $reminder = new Reminder($user_id, $note_id, $formattedDateTime);

            if ($reminder->create()) {
                header('Location: ../views/home.php?success=reminder_added');
            } else {
                header('Location: ../views/home.php?error=failed');
            }
        }
    }
}

$reminderController = new ReminderController();
$reminderController->create_reminder();
