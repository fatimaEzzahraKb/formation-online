<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login3.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <title>Document</title>
</head>
<body class="page">
    <div >
        <div class="container">
          <div class="left">
            <div class="login">Login</div>
            <!-- <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div> -->
          </div>
          <div class="right">
            <svg viewBox="0 0 320 300">
              <defs>
                <linearGradient
                                inkscape:collect="always"
                                id="linearGradient"
                                x1="13"
                                y1="193.49992"
                                x2="307"
                                y2="193.49992"
                                gradientUnits="userSpaceOnUse">
                  <stop
                        style="stop-color:#ff00ff;"
                        offset="0"
                        id="stop876" />
                  <stop
                        style="stop-color:#ff0000;"
                        offset="1"
                        id="stop878" />
                </linearGradient>
              </defs>
              <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
            </svg>
            <div id="loginForm" class="form">
              <!-- <form id="loginForm"> -->
                <label for="email">Email</label>
                <input type="email" name='email' id="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <button id="login-btn" type="button">Se Connecter</button>
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>
<!-- <script src="js/login.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function test(event) {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/categories', // Change this to your login endpoint
      type: 'GET', // Use POST for login
      // data: JSON.stringify({ email, password }),
      success: function(response) {
        alert('Response: ' + JSON.stringify(response));
        // Handle success (e.g., redirect or show a message)
      },
      error: function(xhr, status, error) {
        alert('Error: ' + error);
        // Handle error (e.g., show an error message)
      }
    });
  }

  $('#login-btn').on('click', test);
</script>
</body>

</html>