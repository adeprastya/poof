<?php
require_once '../config/db.php';
require_once '../models/Reminder.php';

session_start();


try {
  if (!isset($_SESSION['user_id'])) {
    throw new Exception("User not logged in");
  }

  
} catch (Exception $e) {
  echo json_encode(['error' => $e->getMessage()]);
}
