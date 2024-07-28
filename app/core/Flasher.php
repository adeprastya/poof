<?php

class Flasher
{
  public static function setFlash($type, $message)
  {
    $_SESSION['flash'] = [
      'type' => $type,
      'message' => $message
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      $flash = $_SESSION['flash'];
      unset($_SESSION['flash']);

      return "<div style='
    position: fixed; 
    bottom: 20px; 
    right: 20px; 
    padding: 15px 25px; 
    background-color: #f8d7da; 
    color: #721c24; 
    border: 1px solid #f5c6cb; 
    border-radius: 5px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    font-family: Arial, sans-serif; 
    font-size: 14px;
    z-index: 1000;
    '>" . $flash['type'] . $flash['message'] . "</div>";
    }
  }
}
