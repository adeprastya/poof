<?php

class Trash_model
{
  private $table = 'trash';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll($id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE user_id = :user_id ORDER BY created_at DESC");
    $this->db->bind('user_id', $id);

    return $this->db->resultSet();
  }

  public function get($id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE id=:id");
    $this->db->bind('id', $id);

    return $this->db->single();
  }
}
