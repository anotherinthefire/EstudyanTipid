<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Estudyantipid | Home </title>
  <?php
  echo '<link rel="stylesheet" href="../style/style.css">';
  echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
  echo '<link rel="stylesheet" href="../style/profile.css">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  ?>
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
        <a href="#">
          <i class='bx bx-wallet'></i>
          <span class="link_name">Wallet</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Wallet</a></li>
        </ul>
      </li>

      <!--record-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-file'></i>
            <span class="link_name">Record Statistics</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Record Statistics</a></li>
        </ul>
      </li>

      <!--budget-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-credit-card'></i>
            <span class="link_name">Budget</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Budget</a></li>
        </ul>
      </li>

      <!--goals-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-target-lock'></i>
            <span class="link_name">Goals</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Goals</a></li>
          <li><a href="#">Manage</a></li>
          <li><a href="#">Achieved</a></li>
        </ul>
      </li>

      <!-- planned budget-->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-credit-card-alt'></i>
            <span class="link_name">Planned Budget</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Planned Budget</a></li>
          <li><a href="#">Add</a></li>
          <li><a href="#">Manage</a></li>
        </ul>
      </li>

      <!--profile-->
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="link_name">Profile</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Profile</a></li>
        </ul>
      </li>

      <!--log out-->
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="../img/rj-profile.png" alt="profile">
          </div>
          <div class="name-job">
            <div class="profile_name">RJ.amigo</div>
          </div>
          <i class='bx bx-log-out'></i>
        </div>
      </li>
    </ul>
  </div>

  <!--home-->
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>

      <!--
      <table class="container">
        <tr>
            <td>
                <img src="img/profile.jpg">
            </td>
            <td class="username">
                <h1>RJ Larrab Dnanidref</h1>
                <h6>rjsinatra.qcydoqcu@gmail.com</h6>
                <h6>RJ_Sinatra</h6>
            </td>
        </tr>
        <tr>
            <button class="button">Edit Profile ></button>
        </tr>
     </table>-->
    </div>
  </section>

  <table class="container">
    <tr>
      <th>
        <div class="image-container">
          <img src="../img/rj-profile.png" alt="Avatar">
          <div class="overlay"><i class='bx bx-camera'></i></div>
        </div>
      </th>
      <th class="username">
        <h1>RJ Larrab Dnanidref</h1>
        <h5>rjsinatra.qcydoqcu@gmail.com</h5>
        <h6>RJ_ma.anniga</h6>
      </th>
    </tr>
    <tr class="two-button">
      <td>
        <button class="edit-button" id="myBtn">
          Edit Profile >
        </button>

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
        <button class="change-button">
          Change Password
        </button>
      </td>
    </tr>
  </table>
  <?php
  echo '<script src="../scripts/nav.js"></script>
  </script>
  <script src="../scripts/profile.js">
  </script>';
  ?>
</body>

</html>