<?php

include('../components/config.php');
$email = $_SESSION['reset_email'];

// Query the database to check if the email exists
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

// Check if the email exists in the database
if (mysqli_num_rows($result) == 0) {
  echo "Invalid email address.";
  exit;
}

// Check if the reset token and email are set in the session
if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
  echo "Invalid password reset request.";
  exit;
}

if(isset($_POST['submit'])) {
  // Get the new password from the form
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the password fields
  if (empty($password) || empty($confirm_password)) {
      $error = "Please enter a password and confirm it.";
  } elseif ($password != $confirm_password) {
      $error = "Passwords do not match.";
  } else {
    // Get the email address from the session
    $email = $_SESSION['reset_email'];

    // Update the user's password in the database
    $sql = "UPDATE user SET password='$password' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Password reset successful
        $success = "Your password has been reset.";
        header('Location: Login.php');
        exit;
    } else {
        // Password reset failed
        $error = "Error resetting password: " . mysqli_error($conn);
    }

    // Clear the reset token and email from the session
    unset($_SESSION['reset_token']);
    unset($_SESSION['reset_email']);
  }
}
?>
<html>

<head>
  <title>EstyudanTipid | Reset Password</title>

  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <link href="https://fonts.googlelapis.com/css?family=Poppins" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/forgot.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style=" background:#51D289;">
  <div class="box col-md-6 align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="p-4 text-center mt-5 text-dark fw-bold">
      <img src="b.png" class="mb-3">

      <p class="display-4 fw-bold">Reset Password</p>

    </div>
    <form method="post">
  <?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>

  <?php if(isset($success)): ?>
    <div class="alert alert-success"><?php echo $success; ?></div>
  <?php endif; ?>

  <div class="form-floating mb-3 ms-5 me-5">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="form-floating mb-3 ms-5 me-5">
    <input type="password" class="form-control" id="floatingPassword1" placeholder="Password1" name="confirm_password">
    <label for="floatingPassword1">Confirm Password</label>
  </div>

  <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
    <button class="btn btn-success text-light fs-5" type="submit" name="submit">Submit</button>
  </div>
</form>

    <div class="">
      <a href="Login.php" class="text-dark text-decoration-none position-absolute bottom-0 start-0 mb-3 ms-3 fw-bold"><-Back to Log in</a>
    </div>
  </div>
</body>

</html>