<?php
  
  require_once('config/config.php');

  if (isset($_SESSION['isLoggedIn'])) {
    header('location: index.php');
  }

  require_once('config/conn.php');

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // declare and store values from form Data
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      $_SESSION['isLoggedIn'] = true;
      
      header('location: index.php');

    }else{
      echo "Invalid username and password";
    }

  } 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grading System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h1>Grading System</h1>
              <h3>Login your Account</h3>
              <form action="" method="POST">
                <!-- username -->
                <div class="form-group mb-3">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="username">
                </div> 
                <div class="form-group mb-3">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password">
                </div> 
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                     <a href="register.php">Register new Account</a>
                </div>
                  <div>
                     <button type="submit" class="btn btn-success">Login</button>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>