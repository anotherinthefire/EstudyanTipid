<?php
include_once('../components/config.php');
// Function to generate OTP
// If form is submitted
if(isset($_POST['signup'])) {
  // Get values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Insert user data into database
  $query = "INSERT INTO user (first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
  $result = mysqli_query($conn, $query);
  
  // Redirect to login page
  header('Location: login.php');
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EstyudanTipid | Signup</title>
  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/sign.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="back1">

  </div>

  <div class="back2">
    <img src="https://i.ibb.co/rMN93nZ/Estudyan-Tipid-logo-black-removebg-preview.png" alt="Estudyan-Tipid-logo-black-removebg-preview" border="0"></a>
  </div>
  <div class="box col-md-4 align-items-center position-absolute top-50 start-50 translate-middle">
<form method="post" action="">
<div class="p-3 ms-5 mt-5 text-light">
        <h1>Sign up</h1>
        <p>Please enter your details</p>
        </div>
        
        <div class="form-floating mb-3 ms-5 me-5">
            <input 
            type="text" 
            class="form-control" 
            id="floatingFName" 
            placeholder="name@example.com" 
            name="first_name" required
            >
            <label for="floatingInput">First Name</label>
          </div>
  
          
        <div class="form-floating mb-3 ms-5 me-5">
          <input 
          type="text" 
          class="form-control" 
          id="floatingLName" 
          placeholder="name@example.com" 
          name="last_name" required>
          <label for="floatingInput">Last Name</label>
        </div>
  
        <div class="form-floating mb-3 ms-5 me-5">
          <input 
          type="email" 
          class="form-control" 
          id="floatingEmail" 
          placeholder="name@example.com"
          name="email" required >
          <label for="floatingInput">Email</label>
        </div>
  
        
        <div class="form-floating mb-3 ms-5 me-5">
          <input 
          type="text" 
          class="form-control" 
          id="floatingUser" 
          placeholder="name@example.com" 
          name="username" required>
          <label for="floatingInput">Username</label>
        </div>
  
          <div class="form-floating mb-5 ms-5 me-5">
            <input 
            type="password" 
            class="form-control"
            id="floatingPassword" 
            placeholder="Password"
            name="password" required>
            <label for="floatingPassword">Password</label>
          </div>
    
         
          
          <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
            <button 
            class="btn btn-success text-light fs-5" 
            type="submit"
            name="signup">Sign Up</button>
          </div>
  
          <div class="col-12">
              <div class="form-check text-light">
                <input class="form-check-input  ms-4" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label ms-1" for="invalidCheck" >
                  Agree to terms and conditions
                </label>
               
              </div>
            </div>

  </div>
</form>

    
  
  
  </body>
</html>