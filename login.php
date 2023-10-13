<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="shortcut icon" href="public/image/untan.png" />
</head>

<body>
  <div class="d-flex border-dark bg-primary shadow-sm z-3 position-relative">
      <div class="p-2 ms-5 flex-grow-1">
        <a href="index.php">
          <button class="btn btn-outline-dark text-center" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
              <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
              </svg>
              HOME
          </button>
        </a>
      </div>
      <div class="p-2 me-5">
          <a href="login.php">
              <button class="btn btn-outline-dark active" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                  LOGIN                                      
              </button>
          </a>
      </div>
  </div>
  
  <div class="d-flex z-3 position-relative">
    <div class="p-2 ms-5 flex-grow-1">
    </div>
    <div class="p-2 me-5">
      <div class="alert alert-danger alert-dismissible fade <?= isset($_SESSION["loginError"]) ? 'show' : ''; ?>" role="alert">
        Login Gagal!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-1">
    <div class="row">
      <div class="col-md-12">
        <form action="login-process.php" method="post">
          <div class="row">
            <div class="col-md-12">
              <h3>Login Sekarang</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="username">Username</label>
              <input type="text" placeholder="Username" id="username" name="username" autofocus required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="password">Password</label>
              <input type="password" placeholder="Password" id="password" name="password" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button class="button-login btn btn-outline-warning" type="submit" name="login">
                LOGIN     
              </button>
            </div>
          </div>
        </form>
        <div class="footer">
            <div class="d-flex border-dark bg-secondary shadow-sm">
                <div class="p-2 ms-5 flex-grow-1">
                    <img src="public/image/untan.png" width="30px" class="mx-1 me-md-2">
                    <span>
                    Sistem Informasi Monitoring gas etilen pisang
                    </span>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>