<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Achievements </title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
        <?php include '../style/goal-achieved.css'; ?>
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

            <!--profile-->
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

                      
                      <li>
                          <div class='profile-details'>
                              <div class='profile-content'>
                                  <img src='../img/rj-profile.jpg' alt='profile'>
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
        </ul>
    </div>

    <!--home-->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <h1 class="page-title">ACHIEVEMENTS</h1>
            <br>
            <div class="card">
                <div class="budget-details">
                <?php 
					
                    $query = "SELECT * FROM goal WHERE status ='achieved' and userid =".$_SESSION['userid']." ORDER BY gid ASC";                   
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0)
                    {

                        while ($row = mysqli_fetch_array($result))
                         {    
                            if (isset($_SESSION['userid']))
                            {                   
                            echo"<table style='width:100%'>";
                            echo"<tr>
                                    <th style='text-align: left; font-weight: normal;'>".$row["gtitle"]."</th>
                                    <th style='text-align: center; font-weight: normal;'></th>
                                        <th style='text-align: right; font-weight: normal;'>
                                            <span style='color:#FF0000; padding-right:10px;'>Goal Date:</span>".$row["gddate"]."</th>
                                    </tr>
                                    <tr>
                                        <td style='padding-top:20px;'></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: left;'>
                                            <span style='color:#17CF26; padding-left:10px;'>".$row['status']."</span>
                                        </td>
                                        <td></td>
                                        <td style='text-align: right;'><span style='color:#17CF26; padding-right:10px'>Goal Item Price:</span>".$row['gtamount']."</td>
                                    </tr>";
                                }
                                echo "</table>";
                                                              
                         }                           
                        }                 
                     ?> 
                </div>
            </div>
        </div>
    </section>
    <?php
    echo '<script src="../scripts/nav.js"></script>
  </script>';
    echo '<script src="../scripts/rec-stats.js">
  </script>';
    ?>
    <script>
        <?php include '../scripts/rec-stats.js'; ?>
    </script>
</body>

</html>