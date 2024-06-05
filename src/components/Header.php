<?php
function Headers($active = 'home')
{
  switch ($active) {
    case 'home':
      return '<header id="nav">
      <div>
        <h1>Home</h1>
    
        <span id="nav-close">x</span>
      </div>
    
      <nav>
        <a href="./home.php" class="nav-active">Home</a>
        <a href="./trash.php">Trash</a>
      </nav>
    
      <a href="./logout.php">Logout</a>
    </header>';

    case 'trash':
      return '<header id="nav">
      <div>
        <h1>Home</h1>
    
        <span id="nav-close">x</span>
      </div>
    
      <nav>
        <a href="./home.php">Home</a>
        <a href="./trash.php" class="nav-active">Trash</a>
      </nav>
    
      <a href="./logout.php">Logout</a>
    </header>';
  }
}
