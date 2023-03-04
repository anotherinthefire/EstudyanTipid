<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/example.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         
       
            <div class="card1 col-12 align-items-center position-absolute top-50 start-50 translate-middle">
               
                <div class="p-5 ms-3 mt-5 text-light">
                  <h1>Log in</h1>
                  <p>Please enter your details</p>
                  </div>
                  
                  <div class="form-floating mb-3 ms-5 me-5">
                      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" >
                      <label for="floatingInput">Email or Username</label>
                    </div>
                    <div class="form-floating mb-3 ms-5 me-5">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>
              
                    <div class="text-end mx-5">
                        <a href="forgot.php" class="text-light">Forgot password?</a>
                    </div>
                    
                    <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
                      <button class="btn btn-success text-light fs-5" type="submit">Sign in</button>
                    </div>
              
                    <div class="">
                        <p class="text-light text-center">Don't have an account? <a href="#" class="text-success">Create new account</a></p>
                    </div>
              </div>
             
            
              </div>
        </div>
      
    
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>