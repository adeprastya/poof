<?php
function AddCollabModal($noteId)
{
  return '
  <div class="modal collab-modal">
    <h3>Add Collaborator</h3>
    
    <a href="home.php">x</a>

    <form action="../controllers/NoteController.php" method="POST"> 
      <div>
        <input type="email" name="collab_email" placeholder="Email">
      </div>

      <button type="submit" name="add_collab" value="' . $noteId . '">Add</button>
    </form>
  </div>
  ';
}
