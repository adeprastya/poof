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
    $reminder_date = $_POST['reminder_date'];
    $reminder_time = $_POST['reminder_time'];

    $reminder_datetime = $reminder_date . ' ' . $reminder_time;

    $reminderDateTime = new DateTime($reminder_datetime);

    $controller = new ReminderController();
    $controller->createReminder($note_id, $reminderDateTime->format('Y-m-d H:i:s'));

    echo "Reminder set successfully!";
} else {
    echo "Invalid request method.";
}
?>
