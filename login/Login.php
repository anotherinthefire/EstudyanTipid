<?php
session_start();
include_once('../components/config.php');

if(isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE (email = '$login' OR username = '$login') AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $user['userid'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../componens/profile.php');
        exit;
    } else {

        $error_message = "Invalid login credentials.";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EstyudanTipid | Login</title>
  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="back1">

  </div>
  <div class="back2">
    <img src="https://i.ibb.co/rMN93nZ/Estudyan-Tipid-logo-black-removebg-preview.png" alt="Estudyan-Tipid-logo-black-removebg-preview" border="0"></a>
  </div>
  <form method="POST">
    <div class="card1 col-md-4 align-items-center position-absolute top-50 start-50 translate-middle">
<!-- signup -->
      <div class="p-5 ms-3 mt-5 text-light">
        <h1 class="font-family: Poppins">Log in</h1>
        <p>Please enter your details</p>
      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input 
        type="text" 
        class="form-control" 
        id="floatingInput" 
        placeholder="name@example.com"
        name="login" required>
        <label for="floatingInput">Email or Username</label>
      </div>

      <div class="form-floating mb-3 ms-5 me-5">
        <input 
        type="password" 
        class="form-control" 
        id="floatingPassword" 
        placeholder="Password"
        name="password" required>
        <label for="floatingPassword">Password</label>
      </div>

      <?php 
      if(isset($error_message)) { 
        echo "<p>$error_message</p>"; 
        } ?>

      <div class="text-end mx-5">
        <a href="forgot.html" class="text-light">Forgot password?</a>
      </div>

      <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
        <button class="btn btn-success text-light fs-5" 
        type="submit" 
        name="login"
        >Sign in</button>
      </div>

      <div class="">
        <p class="text-light text-center">Don't have account? <a href="signup.php" class="text-success">Create new account</a></p>
      </div>


    </div>
  </form>

</body>

</html>