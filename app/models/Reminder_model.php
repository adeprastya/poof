<?php

class Reminder_model
{
  private $table = 'reminder';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll($id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE user_id = :user_id");
    $this->db->bind('user_id', $id);

    return $this->db->resultSet();
  }

  public function get($id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE id=:id");
    $this->db->bind('id', $id);

    return $this->db->single();
  }

  public function create($data)
  {
    $this->db->query("INSERT INTO $this->table (user_id, note_id, remind_at) VALUES (:user_id, :note_id, :remind_at)");
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('note_id', $data['note_id']);
    $this->db->bind('remind_at', $data['remind_at']);

    return $this->db->execute();
  }
}
