<?php
include_once('../components/config.php');
?>
<html>

<head>
  <title>EstyudanTipid | Budget</title>

  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <link href="https://fonts.googlelapis.com/css?family=Poppins" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/forgot.css">
  <link rel="stylesheet" href="css/budget.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style=" background:#51D289;">
  <div class="box  align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="p-4 text-center mt-5 text-dark">
      <img src="https://i.ibb.co/82wTcnN/wallet.png" alt="wallet">
      
      
    <form method="POST" action="budgeting.php"> 
      <p class="display-4 fw-bold">Set up cash balance</p>
      <p>How much do you have in your physical wallet?</p>

     
      <input type="number" placeholder="0" PHP class="display-3 mt-5" style=" width: 20%;border: none;border-color: transparent;resize:both; text-align:right;" name="balance" required>                                  
   <Modalities>
</Modalities>
   <label class="display-3 mt-5" style="margin-right:10%;"> PHP</label>
    </div>
   
    <div class="d-grid gap-2 mb-3 ms-5 me-5 mt-3">
      <button type="submit" class="btn btn-success text-light fs-5 " name="wallet">Set Balance</button>
    </div>
    </form>
</body>
</html>