<?php

function PopUp($type, $message)
{
  switch ($type) {
    case 'success':
      return '
      <div class="pop-up success">
        <p>Succes: ' . $message . '</p>
      </div>
      ';

    case 'error':
      return '
      <div class="pop-up error">
        <p>Error: ' . $message . '</p>
      </div>
      ';
  }
}
