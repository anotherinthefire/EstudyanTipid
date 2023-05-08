<?php
include_once('../components/config.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Record Statistics </title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
        <?php include '../style/rec-stats.css'; ?><?php include '../style/style.css'; ?>
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

if (isset($_SESSION['userid'])) {
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM user WHERE userid = '$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $img_filename = $row['img'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];

        echo "
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
                    <img src='../img/$img_filename' alt='profile'>
                </div>
                <div class='name-job'>
                    <div class=profile_name>$first_name $last_name</div>
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

            <!-- <div class="col-xs-6" id="sort">
                <select name="history" id="history">
                    <option>--sort by--</option>
                    <option id="date">date</option>
                    <option id="budget">budget</option>
                    <option id="expenses">expenses</option>
                    <option id="income">income</option>
                </select>

            </div> -->
            <!-- search -->
            <div class="wrap">
    <form method="get" action="">
        <div class="search">
            <button type="submit" class="searchButton">
                <i class='bx bx-search-alt-2'></i>
            </button>
            <input type="text" class="searchTerm" name="searchTerm" placeholder="Search..." value="<?php echo isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '' ?>">
        </div>
    </form>
</div>


            <br>
            <div class="card">
                <?php
                $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

                // retrieve data from expenses table
                $query_expenses = "SELECT * FROM expenses WHERE status = 'PAID' AND userid = " . $_SESSION['userid'] . " 
                AND (xname LIKE '%$searchTerm%' 
                OR xpayee LIKE '%$searchTerm%' 
                OR xamount LIKE '%$searchTerm%' 
                OR status LIKE '%$searchTerm%' 
                OR xname LIKE '%$searchTerm%'
                OR xdate LIKE '%$searchTerm%') ORDER BY exid DESC";
                $result_expenses = mysqli_query($conn, $query_expenses);
            
                // retrieve data from budget table
                $query_budget = "SELECT * FROM budget WHERE budget_status = 'expired' AND userid = " . $_SESSION['userid'] . " 
                AND (bname LIKE '%$searchTerm%' 
                OR budget LIKE '%$searchTerm%'
                OR period LIKE '%$searchTerm%') ORDER BY budgetid DESC";
                $result_budget = mysqli_query($conn, $query_budget);
            
                // retrieve data from goal table
                $query_goal = "SELECT * FROM goal WHERE status = 'ACHIEVED' AND userid = " . $_SESSION['userid'] . " 
                AND (gtitle LIKE '%$searchTerm%' 
                OR gtamount LIKE '%$searchTerm%'
                OR gddate LIKE '%$searchTerm%') ORDER BY gid DESC";
                $result_goal = mysqli_query($conn, $query_goal);
            
                // expenses
                while ($row_expenses = mysqli_fetch_array($result_expenses)) {
                ?>
                    <div class="budget-details">
                        <table style="width:100%">
                            <tr>
                                <th style="text-align: left; font-weight: normal;">
                                    <?php echo $row_expenses['xname']; ?>
                                </th>
                                <th style="text-align: center; font-weight: normal;"></th>
                                <th style="text-align: right; font-weight: normal;">
                                    <span style="color:#FF0000; padding-left:10px;">
                                        Plan Due Date:
                                    </span>
                                    <?php echo $row_expenses['xdate']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-top:20px; "></td>
                                <td></td>
                                <td style="text-align: right; font-weight: normal;">
                                    <span style="color:#17CF26; padding-right:10px;">
                                        Item Price:
                                    </span>
                                    ₱<?php echo $row_expenses['xamount']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <span style="color:#FF0000; padding-left:10px;">
                                        <?php echo $row_expenses['status']; ?>
                                    </span>
                                </td>
                                <td></td>
                                <td style="text-align: right;">
                                    <span style="color:#FF0000; padding-right:10px">
                                        Payee:
                                    </span>
                                    <?php echo $row_expenses['xpayee']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>


                <!-- budget -->
                <?php while ($row_budget = mysqli_fetch_array($result_budget)) { ?>
                    <div class="budget-details">
                        <table style="width:100%">
                            <tr>
                                <th style="text-align: left; font-weight: normal;">
                                    <?php echo $row_budget['bname']; ?>
                                </th>
                                <th style="text-align: center; font-weight: normal;">

                                </th>
                                <th style="text-align: right; font-weight: normal;">
                                    <span style="color:#FF0000; padding-left:10px;">
                                        Budget Deadline:
                                    </span>
                                    <?php echo $row_budget['period']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-top:20px; "></td>
                                <td></td>
                                <td style="text-align: right; font-weight: normal;">
                                    <span style="color:#17CF26; padding-right:10px;">
                                        Budget Savings:
                                    </span>
                                    ₱<?php echo $row_budget['budget']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <span style="color:#17CF26; padding-left:10px;">
                                        <?php echo $row_budget['budget_status']; ?>
                                    </span>
                                </td>
                                <td>

                                </td>

                            </tr>
                        </table>
                    </div>

                <?php
                }
                ?>





                <!-- goal -->
                <?php while ($row_goal = mysqli_fetch_array($result_goal)) { ?>
                    <div class="budget-details">
                        <table style="width:100%">
                            <tr>
                                <th style="text-align: left; font-weight: normal;">
                                    <?php echo $row_goal['gtitle']; ?>
                                </th>
                                <th style="text-align: center; font-weight: normal;">

                                </th>
                                <th style="text-align: right; font-weight: normal;">
                                    <span style="color:#FF0000; padding-left:10px;">
                                        Goal Due Date:
                                    </span>
                                    <?php echo $row_goal['gddate']; ?>
                                </th>
                            </tr>
                            <tr>
                                <td style="padding-top:20px; "></td>
                                <td></td>
                                <td style="text-align: right; font-weight: normal;">
                                    <span style="color:#17CF26; padding-right:10px;">
                                        Goal Amount:
                                    </span>
                                    ₱<?php echo $row_goal['gtamount']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <span style="color:#17CF26; padding-left:10px;">
                                        <?php echo $row_goal['status']; ?>
                                    </span>
                                </td>
                                <td>

                                </td>

                            </tr>
                        </table>
                    </div>

                <?php
                }
                ?>






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