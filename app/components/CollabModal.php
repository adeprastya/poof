<?php

function collabModal()
{
  return '
  <div id="collab-modal" class="modal collab-modal">
    <h3>Add Collaborator</h3>

    <button class="close-collab-modal">x</button>

    <form action="' . BASE_URL . '/note/collab" method="POST">
      <div>
        <input type="email" name="collab_email" placeholder="Email">
      </div>

      <input type="hidden" name="id" value="">

      <button type="submit">Add</button>
    </form>
  </div>
  ';
}
