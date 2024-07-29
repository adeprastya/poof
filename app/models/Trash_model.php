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

  public function create($data)
  {
    $this->db->query("INSERT INTO $this->table VALUES ('', :user_id, current_timestamp(), :created_at, :type, :is_favorite, :title, :content, :collaborator_id)");
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('created_at', $data['created_at']);
    $this->db->bind('type', $data['type']);
    $this->db->bind('is_favorite', $data['is_favorite']);
    $this->db->bind('title', $data['title']);
    $this->db->bind('content', $data['content']);
    $this->db->bind('collaborator_id', $data['collaborator_id']);

    return $this->db->execute();
  }
}
