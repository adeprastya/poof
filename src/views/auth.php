<!DOCTYPE html>
<html lang="en">

  <?php
  include_once ('../components/PopUp.php');
  ?>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poof | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/auth.css?v=<?= time() ?>">

    <script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
  </head>

  <body>
    <h2 class="hero">Poof</h2>

    <div class="card" id="login-card">
      <h1>Login</h1>

      <form action="../controllers/UserController.php" method="POST">
        <div>
          <label for="email-login"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 2C0.447715 2 0 2.44772 0 3V12C0 12.5523 0.447715 13 1 13H14C14.5523 13 15 12.5523 15 12V3C15 2.44772 14.5523 2 14 2H1ZM1 3L14 3V3.92494C13.9174 3.92486 13.8338 3.94751 13.7589 3.99505L7.5 7.96703L1.24112 3.99505C1.16621 3.94751 1.0826 3.92486 1 3.92494V3ZM1 4.90797V12H14V4.90797L7.74112 8.87995C7.59394 8.97335 7.40606 8.97335 7.25888 8.87995L1 4.90797Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <p>Email</p>
          </label>
          <input type="email" name="email" id="email-login" required>
        </div>

        <div>
          <label for="password-login"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 4.63601C5 3.76031 5.24219 3.1054 5.64323 2.67357C6.03934 2.24705 6.64582 1.9783 7.5014 1.9783C8.35745 1.9783 8.96306 2.24652 9.35823 2.67208C9.75838 3.10299 10 3.75708 10 4.63325V5.99999H5V4.63601ZM4 5.99999V4.63601C4 3.58148 4.29339 2.65754 4.91049 1.99307C5.53252 1.32329 6.42675 0.978302 7.5014 0.978302C8.57583 0.978302 9.46952 1.32233 10.091 1.99162C10.7076 2.65557 11 3.57896 11 4.63325V5.99999H12C12.5523 5.99999 13 6.44771 13 6.99999V13C13 13.5523 12.5523 14 12 14H3C2.44772 14 2 13.5523 2 13V6.99999C2 6.44771 2.44772 5.99999 3 5.99999H4ZM3 6.99999H12V13H3V6.99999Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <p>Password</p>
          </label>
          <input type="password" name="password" id="password-login" required>
        </div>

        <button type="submit" name="login">LOGIN</button>
      </form>

      <p id="login-anchor">Dont have account? Create account</p>
    </div>

    <div class="card" id="signup-card">
      <h1>Sign Up</h1>

      <form action="../controllers/UserController.php" method="POST">
        <div>
          <label for="name"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7.5 0.875C5.49797 0.875 3.875 2.49797 3.875 4.5C3.875 6.15288 4.98124 7.54738 6.49373 7.98351C5.2997 8.12901 4.27557 8.55134 3.50407 9.31167C2.52216 10.2794 2.02502 11.72 2.02502 13.5999C2.02502 13.8623 2.23769 14.0749 2.50002 14.0749C2.76236 14.0749 2.97502 13.8623 2.97502 13.5999C2.97502 11.8799 3.42786 10.7206 4.17091 9.9883C4.91536 9.25463 6.02674 8.87499 7.49995 8.87499C8.97317 8.87499 10.0846 9.25463 10.8291 9.98831C11.5721 10.7206 12.025 11.8799 12.025 13.5999C12.025 13.8623 12.2376 14.0749 12.5 14.0749C12.7623 14.075 12.975 13.8623 12.975 13.6C12.975 11.72 12.4778 10.2794 11.4959 9.31166C10.7244 8.55135 9.70025 8.12903 8.50625 7.98352C10.0187 7.5474 11.125 6.15289 11.125 4.5C11.125 2.49797 9.50203 0.875 7.5 0.875ZM4.825 4.5C4.825 3.02264 6.02264 1.825 7.5 1.825C8.97736 1.825 10.175 3.02264 10.175 4.5C10.175 5.97736 8.97736 7.175 7.5 7.175C6.02264 7.175 4.825 5.97736 4.825 4.5Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <p>Name</p>
          </label>
          <input type="name" name="name" id="name" required>
        </div>

        <div>
          <label for="email"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 2C0.447715 2 0 2.44772 0 3V12C0 12.5523 0.447715 13 1 13H14C14.5523 13 15 12.5523 15 12V3C15 2.44772 14.5523 2 14 2H1ZM1 3L14 3V3.92494C13.9174 3.92486 13.8338 3.94751 13.7589 3.99505L7.5 7.96703L1.24112 3.99505C1.16621 3.94751 1.0826 3.92486 1 3.92494V3ZM1 4.90797V12H14V4.90797L7.74112 8.87995C7.59394 8.97335 7.40606 8.97335 7.25888 8.87995L1 4.90797Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <p>Email</p>
          </label>
          <input type="email" name="email" id="email" required>
        </div>

        <div>
          <label for="password"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 4.63601C5 3.76031 5.24219 3.1054 5.64323 2.67357C6.03934 2.24705 6.64582 1.9783 7.5014 1.9783C8.35745 1.9783 8.96306 2.24652 9.35823 2.67208C9.75838 3.10299 10 3.75708 10 4.63325V5.99999H5V4.63601ZM4 5.99999V4.63601C4 3.58148 4.29339 2.65754 4.91049 1.99307C5.53252 1.32329 6.42675 0.978302 7.5014 0.978302C8.57583 0.978302 9.46952 1.32233 10.091 1.99162C10.7076 2.65557 11 3.57896 11 4.63325V5.99999H12C12.5523 5.99999 13 6.44771 13 6.99999V13C13 13.5523 12.5523 14 12 14H3C2.44772 14 2 13.5523 2 13V6.99999C2 6.44771 2.44772 5.99999 3 5.99999H4ZM3 6.99999H12V13H3V6.99999Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <P>Password</P>
          </label>
          <input type="password" name="password" id="password" required>
        </div>

        <div>
          <label for="confirm-password"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 4.63601C5 3.76031 5.24219 3.1054 5.64323 2.67357C6.03934 2.24705 6.64582 1.9783 7.5014 1.9783C8.35745 1.9783 8.96306 2.24652 9.35823 2.67208C9.75838 3.10299 10 3.75708 10 4.63325V5.99999H5V4.63601ZM4 5.99999V4.63601C4 3.58148 4.29339 2.65754 4.91049 1.99307C5.53252 1.32329 6.42675 0.978302 7.5014 0.978302C8.57583 0.978302 9.46952 1.32233 10.091 1.99162C10.7076 2.65557 11 3.57896 11 4.63325V5.99999H12C12.5523 5.99999 13 6.44771 13 6.99999V13C13 13.5523 12.5523 14 12 14H3C2.44772 14 2 13.5523 2 13V6.99999C2 6.44771 2.44772 5.99999 3 5.99999H4ZM3 6.99999H12V13H3V6.99999Z"
                fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
            <P>Confirm Password</P>
          </label>
          <input type="password" name="confirm-password" id="confirm-password" required>
        </div>

        <button type="submit" name="signup">SIGN UP</button>
      </form>

      <p id="signup-anchor">Already have an account? Login</p>
    </div>

    <?php
    if (isset($_GET['success']))
      echo PopUp("success", $_GET['success']);

    if (isset($_GET['error']))
      echo PopUp("error", $_GET['error']);
    ?>

    <script src="../assets/js/auth.js"></script>
    <script>
      new kursor({
        type: 4,
        removeDefaultCursor: true,
        color: '#fff'
      })
    </script>
  </body>

</html>

