<?php

class Trash extends Controller
{
  public function index()
  {
    $data['trashes'] = $this->model("Trash_model")->getAll($_SESSION['user_id']);
    $data['user'] = $this->model("User_model")->get($_SESSION['user_id']);

    $this->view("trash/index", $data);
  }
}
