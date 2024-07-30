<?php

function collabModal()
{
  return '
  <div id="collab-modal" class="modal collab-modal">
    <button class="close-collab-modal close">x</button>
  
    <h3>Add Collaborator</h3>

    <form action="' . BASE_URL . '/note/collab" method="POST">
      <div>
        <label for="collab_email">Collaborator Email</label>

        <input type="email" name="collab_email" id="collab_email" placeholder="Email">
      </div>

      <input type="hidden" name="id" value="">

      <button type="submit">Add</button>
    </form>
  </div>
  ';
}
