<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Estudyantipid | Profile </title>
  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <?php
  echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  ?>

  <style>
    <?php include '../style/profile.css'; ?>
    <?php include '../style/style.css'; ?>
  </style>
</head>

<body>
<div class="sidebar close">

<!--logo-->
<div class="logo-details">
    <span class="logo_name"><img src="../img/logo.png" class="logo"></span>
</div>

<!--nav-->
<ul class="nav-links">

    <!--wallet-->
    <li>
        <a href="wallet.php">
            <i class='bx bx-wallet'></i>
            <span class="link_name">Wallet</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="wallet.php">Wallet</a></li>
        </ul>
    </li>

    <!--record-->
    <li>
        <div class="iocn-link">
            <a href="rec-stats.php">
                <i class='bx bx-file'></i>
                <span class="link_name">Record Statistics</span>
            </a>
        </div>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="rec-stats.php">Record Statistics</a></li>
        </ul>
    </li>

    <!--budget-->
    <li>
        <div class="iocn-link">
            <a href="budget.php">
                <i class='bx bx-credit-card'></i>
                <span class="link_name">Budget</span>
            </a>
        </div>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="budget.php">Budget</a></li>
        </ul>
    </li>

    <!--goals-->
    <li>
        <div class="iocn-link">
            <a href="goal.php">
                <i class='bx bx-target-lock'></i>
                <span class="link_name">Goals</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="goal.php">Goals</a></li>
            <li><a href="goal-manage.php">Manage</a></li>
            <li><a href="goal-achieved.php">Achieved</a></li>
        </ul>
    </li>

    <!-- planned budget-->
    <li>
        <div class="iocn-link">
            <a href="planned.php">
                <i class='bx bx-credit-card-alt'></i>
                <span class="link_name">Planned Budget</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="planned.php">Planned Budget</a></li>
            <li><a href="planned-manage.php">Manage</a></li>
        </ul>
    </li>

    <?php
            
            if (isset($_SESSION['userid']))
                {
                    $id = $_SESSION['userid'];
                    $sql = "SELECT * from user where userid = '$id'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                       {                     
                      
                    
                
                      echo"
                      <li>
                          <a href='profile.php'>
                              <i class='bx bx-user'></i>
                              <span class='link_name'>Profile</span>
                          </a>
                          <ul class='sub-menu blank'>
                              <li><a class='link_name' href='profile.php'>Profile</a></li> 
                          </ul>
                      </li>

                      <!--log out-->
                      <li>
                          <div class='profile-details'>
                              <div class='profile-content'>
                                  <img src='../img/rj-profile.png' alt='profile'>
                              </div>
                              <div class='name-job'>
                                  <div class=profile_name>".$_SESSION['first_name']." ".$_SESSION['last_name']."</div>
                              </div>
                              <a href=logout.php><i class='bx bx-log-out'></i></a>
                          </div>
                      </li>
                  </ul>";
                }
                    }
?>
</div>

  <!--home-->
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <table class="container">
        <tr>
          <th>
            <div class="image-container">
              <img src="../img/rj-profile.png" alt="Avatar">
              <div class="overlay">

                <label for="inputTag">
                  <i class="bx bx-camera"></i>
                  <input id="inputTag" type="file" />
                </label>

              </div>
            </div>
          </th>
          
    <?php
            
            if (isset($_SESSION['userid']))
                {
                    $id = $_SESSION['userid'];
                    $sql = "SELECT * from user where userid = '$id'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                       {                     
                      
          echo"            
          <th class='username'>
            <h1>".$_SESSION['username']."</h1>
            <h5>".$_SESSION['email']."</h5>           
          </th>";
        }
      }
      ?>
        </tr>
        <tr class="two-button">
          <td>
            <button class="edit-button" id="myBtn">
              Edit Profile >
            </button>
            <!-- edit profile -->
            <div id="myModal" class="modal">
              <div class="modal-content">
                <!-- <span class="closee">&times;</span> -->
                <!-- modal content -->
                <h1>Edit Profile</h1>
                <div class="edit-pro">
                  <form action="profile.php">

                    <label for="fname">
                      New username
                      <span class="req">
                        *
                      </span>
                    </label>
                    <input type="text" id="fname" name="firstname" placeholder="">
                </div>
                <input type="submit" value="Submit">
                <input class="closee" type="button" value="Discard">
                </form>

              </div>
            </div>

          </td>
          <td>
            <button class="change-button" id="myBtnn">
              Change Password
            </button>

            <div id="myModall" class="modall">
              <div class="modall-content">
                <!-- <span class="closee">&times;</span> -->
                <!-- modal content -->
                <h1>Change Password</h1>
                <p style="
                    text-align:left; 
                    font-size:13px;
                    padding-top:25px;
                    padding-bottom:25px;
                    ">
                  Changing your password frequently reduces the risk of your account from
                  being hacked<br>
                  <br>
                  In order to protect your account, make sure your password is:<br>
                  &nbsp;• At least 8 - 12 character long.<br>
                  &nbsp;• With combination of uppercase, lowercase letters, numbers, and symbols.<br>
                  &nbsp;• Significantly different from your previous passwords.<br>
                </p>

                <form action=" profile.php">
                  <div class="chan-pass>
                <label for=" old-passowrd" style="
                    text-align:left;
                ">
                    Old password
                    <span class="req">
                      *
                    </span>
                    </label>
                    <input type="password" id="old-password" name="oldpassword" placeholder="">
                    <input type="checkbox" onclick="myFunction()">
                    <span style="font-size:15px;">Show Password</span>
                    <br>

                    <label for="new-passowrd">
                      New password
                      <span class="req">
                        *
                      </span>
                    </label>
                    <input type="password" id="new-password" name="newpassword" placeholder="">

                    <label for="new-passowrd">
                      Confirm new password
                      <span class="req">
                        *
                      </span>
                    </label>
                    <input type="password" id="confirm-new-password" name="connewpassword" placeholder="">
                  </div>

                  <input type="submit" value="Change">
                  <input class="closeee" type="button" value="Discard">
                </form>

              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </section>


  <?php
  echo '<script src="../scripts/nav.js"></script>
  </script>';
  echo '<script src="../scripts/profile.js">
  </script>';
  ?>
  <script>
    <?php include '../scripts/profile.js'; ?>
  </script>
</body>

</html>