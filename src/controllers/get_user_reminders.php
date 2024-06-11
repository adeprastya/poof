<?php
require_once '../config/db.php';
require_once '../models/Reminder.php';

session_start();

header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

try {
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not logged in");
    }

    $user_id = $_SESSION['user_id'];
    $reminders = Reminder::getUserReminders($user_id);
    echo json_encode($reminders);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
