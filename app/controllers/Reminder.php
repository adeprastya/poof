<?php

class Reminder extends Controller
{
  public function get()
  {
    $data = [];

    $reminders = $this->model('Reminder_model')->getAll($_SESSION['user_id']);

    foreach ($reminders as $reminder) {
      $name = $this->model('User_model')->get($reminder['user_id'])['name'];
      $title = $this->model('Note_model')->get($reminder['note_id'])['title'];

      global $data;
      $data[] = [
        'id' => $reminder['id'],
        'name' => $name,
        'title' => $title,
        'remind_at' => $reminder['remind_at'],
      ];
    }
    ;

    echo json_encode($data);
  }
}
