<?php

class User_model
{
  private $table = 'user';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll()
  {
    $this->db->query("SELECT * FROM $this->table");

    return $this->db->resultSet();
  }

  public function get($id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE id=:id");
    $this->db->bind('id', $id);

    return $this->db->single();
  }

  public function authenticate($data)
  {
    $this->db->query("SELECT * FROM $this->table WHERE email=:email");
    $this->db->bind('email', $data['email']);

    $user = $this->db->single();

    if (password_verify($data['password'], $user['password'])) {
      $_SESSION['user_id'] = $user['id'];

      return $user;
    }

    return false;
  }

  public function create($data)
  {
    $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

    $this->db->query("INSERT INTO $this->table (name, email, password) VALUES (:name, :email, :password)");
    $this->db->bind('name', $data['name']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $hashed_password);

    return $this->db->execute();
  }
}
