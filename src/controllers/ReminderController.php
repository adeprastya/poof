<?php
include_once ('../models/Note.php');

class ReminderController 
{
  public function new_reminder()
  {
    if (isset($_POST['new_reminder'])) {
      $note_id = $_POST['note_id'];
      $remind_at = $_POST['remind_at'];

      $reminder = Reminder::create($note_id, $remind_at);

      if ($reminder) {
        header('Location: ../views/home.php?success=created');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function update_reminder()
  {
    if (isset($_POST['update_reminder'])) {
      $id = $_POST['update_reminder'];
      $note_id = $_POST['note_id'];
      $remind_at = $_POST['remind_at'];

      $reminder = Reminder::update($id, $note_id, $remind_at);

      if ($reminder) {
        header('Location: ../views/home.php?success=updated');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function delete_reminder()
  {
    if (isset($_GET['delete_reminder'])) {
      $id = $_GET['delete_reminder'];

      $delete = Reminder::delete($id);
      if ($delete) {
        header('Location: ../views/home.php?success=deleted');
      } else {
        header('Location: ../views/home.php?error=failed');
      }
    }
  }

  public function send_reminders()
  {
    $reminders = Reminder::where('remind_at', '<=', now())->where('is_sent', 0)->get();
    foreach ($reminders as $reminder) {
      // Send reminder notification to user
      // ...
      $reminder->is_sent = 1;
      $reminder->save();
    }
  }
}

$reminderController = new ReminderController();
$reminderController->new_reminder();
$reminderController->update_reminder();
$reminderController->delete_reminder();
$reminderController->send_reminders();