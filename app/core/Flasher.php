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

      return "<div class='flash " . $flash['type'] . "'><p>" . $flash['message'] . "</p></div>";
    }
  }
}
