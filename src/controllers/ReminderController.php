<?php
require_once '../config/db.php'; 
require_once '../models/Reminder.php';

class ReminderController {

    public function __construct() {
    }

    public function createReminder($note_id, $remind_at) {
        $reminder = new Reminder($note_id, $remind_at);
        $reminder->save();
    }

    public function send_reminders() {
        $reminders = Reminder::getAllPendingReminders();
        foreach ($reminders as $reminder) {
            $reminder->markAsSent();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note_id = $_POST['note_id'];
    $remind_at = $_POST['remind_at'];

    $reminderDateTime = new DateTime($remind_at);

    $controller = new ReminderController();
    $controller->createReminder($note_id, $reminderDateTime->format('Y-m-d H:i:s'));

        header('Location: ../views/home.php?success=Reminder Set');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
?>
