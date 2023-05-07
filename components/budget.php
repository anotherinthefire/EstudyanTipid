<?php
include_once('../components/config.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Budget </title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
        <?php include '../style/budget.css'; ?><?php include '../style/style.css'; ?>
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

                      <!--log out-->
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
    </div>

    <!--home-->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <h1 class="page-title">BUDGET DETAILS</h1>
            <br>
            <div class="card">
                <div class="budget-details">
                <?php 					
                    $query = "SELECT * FROM budget WHERE userid =".$_SESSION['userid']."";                              
                    $result = mysqli_query($conn, $query);
                    $budgets = array();

                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result))
                         {  
                            array_push($budgets,$row);
                         }
                    }
                    
                    $query1 = "SELECT sum(xamount) as total_expenses FROM expenses WHERE `status` = 'paid' and userid =".$_SESSION['userid']."";                              
                    $result1 = mysqli_query($conn, $query1);
                    $totalExpenses = 0;
                    $budgetSavings = 0;

                    if(mysqli_num_rows($result1) > 0)
                    {
                        while ($row = mysqli_fetch_array($result1))
                         {  
                            $totalExpenses = (int) $row['total_expenses'];
                         }
                    }
                    foreach ($budgets as $key => $row) 
                    {
                        if (isset($_SESSION['userid']))
                        { 
                            $budgetSavings = (int) $row["budget"];                            
                        }
                    }

                    $query2 = "SELECT * FROM budget WHERE userid =".$_SESSION['userid']."";                              
                    $result2 = mysqli_query($conn, $query2);                    
                    if(mysqli_num_rows($result2) > 0)
                    {
                        $dateToday = date('Y-m-d');
                        while ($row = mysqli_fetch_array($result2))
                         {  
                            if($dateToday != $row['period'] && $row['budget_status'] != "expired")
                            {
                               
                            
                    
                            ?>

                <table style="width:100%">
                    <tr>
                        <th style="text-align: left; font-weight: normal;">
                            <?php echo $row["bname"];?>
                        </th>
                        <th style="text-align: center; font-weight: normal;">
                            Until (<?php echo  $row["period"];?>)
                        </th>
                        <th style="text-align: right; font-weight: normal;">
                            TOTAL BALANCE: <?php echo number_format($budgetSavings,2);?>
                        </th>
                    </tr>
                    <tr>
                        <td style="padding-top:20px; "></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            ₱ <?php echo number_format($totalExpenses,2);?><span style="color:#FF0000; padding-left:10px;">Budgeted Deductions</span>
                        </td>
                        <td></td>
                        <td style="text-align: right;">
                            <span style="color:#17CF26; padding-right:10px">Budgeted Savings</span> ₱ <?php echo  number_format(($budgetSavings - $totalExpenses),2);?>
                        </td>
                    </tr>
                </table>
                <?php
                            }
                            else {
                                $id = $row['budgetid'];
                                $sql_update = "UPDATE budget set budget_status = 'expired' WHERE budgetid = '$id'";
                                $res = mysqli_query($conn, $sql_update);


                            }
                        } 

                    }
                    // // print_r($budgets);  
                    // if(mysqli_num_rows($result) > 0)
                    // {

                    //     while ($row = mysqli_fetch_array($result))
                    //      {    
                           
                    //     }
                    // }

                    ?>

                </div>
            </div>

            
            <button class="add" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                <b>+ Add Budget</b>
            </button>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                <!-- modal content -->
                <form class="modal-content" action="binsert.php" method="post">
                    <div class="container">
                        <h1>Budget Details</h1>
                        <hr>

                        <label for="tilt">
                            <b>Title of Budget</b>
                        </label>
                        <input type="text" placeholder="" name="bname" required>

                        <label for="bud">
                            <b>Enter Budget</b>
                        </label>
                        <input type="number" placeholder="0PHP" name="budget" required>

                        <label for="Period">
                            <b>Period:</b>
                            <br>
                        </label>
                        <input type="date" id="period" name="period">
                        <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="text" placeholder="Repeat Password" name="psw-repeat" required> -->
                        <div class="clearfix">
                            <button type="submit" name="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><b>Add Budget</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    echo '<script src="../scripts/nav.js"></script>
  </script>';
    echo '<script src="../scripts/budget.js">
  </script>';
    ?>
    <script>
        <?php include '../scripts/budget.js'; ?>
    </script>
</body>

</html>