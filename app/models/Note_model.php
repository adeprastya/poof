<?php

class Note_model
{
  private $table = 'note';
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
    $this->db->query("INSERT INTO $this->table (title, content, user_id) VALUES (:title, :content, :user_id)");
    $this->db->bind('title', $data['title']);
    $this->db->bind('content', $data['content']);
    $this->db->bind('user_id', $data['user_id']);

    return $this->db->execute();
  }

  public function delete($id)
  {
    $this->db->query("DELETE FROM $this->table WHERE id=:id");
    $this->db->bind('id', $id);

    return $this->db->execute();
  }

  public function edit($data)
  {
    $this->db->query("UPDATE $this->table SET title=:title, content=:content WHERE id=:id");
    $this->db->bind('title', $data['title']);
    $this->db->bind('content', $data['content']);
    $this->db->bind('id', $data['id']);

    return $this->db->execute();
  }

  public function setCollab($note_id, $collaborator_id)
  {
    $collaborators = json_decode($this->get($note_id)['collaborator_id']) ?? [];

    $collaborators[] = $collaborator_id;

    $this->db->query("UPDATE $this->table SET collaborator_id=:collaborators WHERE id=:id");
    $this->db->bind('collaborators', json_encode($collaborators));
    $this->db->bind('id', $note_id);

    return $this->db->execute();
  }

  public function setfavorite($data)
  {
    $favorite = ($data['is_favorite'] == 0) ? 1 : 0;

    $this->db->query("UPDATE $this->table SET is_favorite=:favorite WHERE id=:id");
    $this->db->bind('favorite', $favorite);
    $this->db->bind('id', $data['id']);

    return $this->db->execute();
  }
}
