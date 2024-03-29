<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Home </title>
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
      <?php include '../style/create-form.css';?>
      <?php include '../style/style.css';
      ?>
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
        <h1 class="page-title">BUDGET DETAILS</h1>
        <br>
        <div class="card">
          <div class="budget-details">
            <table style="width:100%">
              <tr>
                <th style="text-align: left;">Personal Expenses</th>
                <th>
                </th>
                <th style="text-align: right;">₱5000</th>
              </tr>
              <tr>
                <td style="padding-top:30px;"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td style="text-align: left;">₱4000 Budgeted Deductions</td>
                <td></td>
                <td style="text-align: right;">Budgeted Savings: ₱1000</td>
              </tr>
            </table>
          </div>
        </div>
        <button class="add" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
          <b>+ Add Budget</b>
        </button>
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

          <!-- modal content -->
          <form class="modal-content" action="/action_page.php">
            <div class="container">
              <h1>Budget Details</h1>
              <hr>
              <label for="tilt"><b>Title of Budget</b></label>
              <input type="text" placeholder="" name="tilt" required>
              <label for="bud"><b>Enter Budget</b></label>
              <input type="number" placeholder="0PHP" name="bud" required>

              <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="text" placeholder="Repeat Password" name="psw-repeat" required> -->
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><b>Add Budget</b></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <?php
    echo '<script src="../scripts/nav.js"></script>
  </script>';
    echo '<script src="../scripts/create-form.js">
  </script>';
    ?>
    <script>
      <?php include '../scripts/create-form.js'; ?>
    </script>
  </body>
</html>