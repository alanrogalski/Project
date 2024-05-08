<html lang="en">
  <head>
    <title>Login In</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style-login.css" />
    <link rel="icon" type="image/x-icon" href="images/icon login.png" />
  </head>
  <body>
  <?php
    // Check if the error parameter exists in the URL
    if (isset($_GET['error']) && $_GET['error'] === "email_exists") {
    // Display an error message indicating that the email already exists
    echo '<div id="error-message" class="alert alert-danger" role="alert">
      Email already exists. Please choose a different email address.
      </div>';
    }

     // Check if the error parameter exists in the URL
     if (isset($_GET['error']) && $_GET['error'] === "nickname_exists") {
      // Display an error message indicating that the nickname already exists
      echo '<div id="error-message" class="alert alert-danger" role="alert">
        Nickname already exists. Please choose a different nickname address.
        </div>';
      }
?>
<script>
        // Pobierz element komunikatu
        var errorMessage = document.getElementById('error-message');

        // Jeśli komunikat istnieje, ustaw czas w milisekundach po którym zostanie automatycznie usunięty (np. 5000 ms = 5 sekund)
        if (errorMessage) {
            setTimeout(function() {
                errorMessage.style.display = 'none'; // Ustaw styl display na none, aby ukryć komunikat
            }, 5000); // 5000 ms = 5 sekund
        }
</script>

    <header>
      <div class="header-left-side">
        <a href="Strona.html"
          ><svg
            version="1.1"
            id="Icons"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 32 32"
            width="65"
            height="65"
            xml:space="preserve"
          >
            <path
              class="st0"
              d="M4,16l8.3,8.3c0.6,0.6,1.7,0.2,1.7-0.7V19h13c0.6,0,1-0.4,1-1v-4c0-0.6-0.4-1-1-1H14V8.4c0-0.9-1.1-1.3-1.7-0.7 L4,16z"
            /></svg>
          </a>
      </div>
      <div class="header-middle-side">
        <h1>NeonGames</h1>
      </div>
      <div class="header-right-side"></div>
    </header>
    <div class="section">
      <div class="container">
        <div class="row full-height justify-content-center">
          <div class="col-12 text-center align-self-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3">
                <span>Log In </span><span>Sign Up</span>
              </h6>
              <input
                class="checkbox"
                type="checkbox"
                id="reg-log"
                name="reg-log"
              />
              <label for="reg-log"></label>
              <div class="card-3d-wrap mx-auto">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Log In</h4>
                        <form action="login.php" method="POST">
                          <div class="form-group">
                            <input
                              id="email"
                              name="email"
                              type="email"
                              class="form-style"
                              placeholder="Email"
                            />
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              id="password"
                              name="password"
                              type="password"
                              class="form-style"
                              placeholder="Password"
                            />
                            <i class="input-icon uil uil-lock-alt"></i>
                          </div>
                          <button type="submit" class="btn mt-4">Login</button>
                          <p class="mb-0 mt-4 text-center">
                            <a href="" class="link">Forgot your password?</a>
                          </p>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-back">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-3 pb-3">Sign Up</h4>
                        <form action="process.php" method="POST">
                          <div class="form-group">
                            <input
                              name="nickname"
                              type="text"
                              class="form-style"
                              placeholder="Nickname"
                            />
                            <i class="input-icon uil uil-user"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              name="phone_number"
                              type="tel"
                              class="form-style"
                              placeholder="Phone Number"
                            />
                            <i class="input-icon uil uil-phone"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              name="email"
                              type="email"
                              class="form-style"
                              placeholder="Email"
                            />
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              name="password"
                              type="password"
                              class="form-style"
                              placeholder="Password"
                            />
                            <i class="input-icon uil uil-lock-alt"></i>
                          </div>
                          <button type="submit" class="btn mt-4">Register</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>