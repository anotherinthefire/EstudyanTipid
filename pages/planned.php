<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Planned Payment </title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
        <?php include '../style/planned.css'; ?><?php include '../style/style.css'; ?>
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
            <h1 class="page-title">PLANNED PAYMENT</h1>
            <br>
            <div class="card">
                <?php
                $query = "SELECT * FROM expenses WHERE status ='on-going' and userid =" . $_SESSION['userid'] . " ORDER BY exid ASC";
                $result = mysqli_query($conn, $query);
                $total_budget = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        if (isset($_SESSION['userid'])) {
                            $total_budget += $row['xamount'];
                ?>
                            <div class="budget-details">
                                <table style="width:100%">
                                    <tr>
                                        <th style="text-align: left; font-weight: normal;">
                                            <?php echo $row['xname']; ?>
                                        </th>
                                        <th style="text-align: center; font-weight: normal;">

                                        </th>
                                        <th style="text-align: right; font-weight: normal;">
                                            <span style="color:#FF0000; padding-left:10px;">
                                                Plan Due Date:
                                            </span>
                                            <?php echo $row['xdate']; ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Budget: <?php echo $row['budgetid']; ?> </td>
                                        <td></td>
                                        <td style="text-align: right; font-weight: normal;">
                                            <span style="color:#17CF26; padding-right:10px;">
                                                Item Price:
                                            </span>
                                            ₱<?php echo $row['xamount']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">
                                            <span style="color:#FF0000; padding-left:10px;">
                                                <?php echo $row['status']; ?>
                                            </span>
                                        </td>
                                        <td>

                                        </td>
                                        <td style="text-align: right;">
                                            <span style="color:#FF0000; padding-right:10px">
                                                Payee:
                                            </span>
                                            <?php echo $row['xpayee']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                <?php
                        }
                    }
                }
                ?>
                <div class="budget-details">
                    <table style="width:100%">
                        <tr>
                            <th style="text-align: left; font-weight: normal;">
                                Total Price
                            </th>
                            <th style="text-align: center; font-weight: normal;">

                            </th>
                            <th style="text-align: right; font-weight: normal;">
                                <span style="color:#17CF26; padding-right:10px;">
                                    ₱<?php echo $total_budget; ?>
                                </span>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>


            <button class="add" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                <b>+ Add Payment</b>
            </button>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <?php
                // Retrieve the user ID from the session
                $user_id = $_SESSION['userid'];

                // Retrieve the budget options based on the user ID
                $query = "SELECT budgetid, bname FROM `budget` WHERE userid = '$user_id' AND budget_status = ''";
                $result = mysqli_query($conn, $query);

                // Create an array of options for each budget
                $budget_options = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $budget_id = $row['budgetid'];
                    $budget_name = $row['bname'];
                    $budget_options[] = array('budgetid' => $budget_id, 'bname' => $budget_name);
                }
                ?>

                <!-- modal content -->
                <form class="modal-content" action="pinsert.php" method="post">
                    <div class="container">
                        <h1>Plan a Payment</h1>
                        <hr>
                        <label for="tilt">
                            <b>Title of Plan</b>
                        </label>
                        <input type="text" placeholder="" name="xname" required>

                        <label for="bud">
                            <b>Enter Budget</b>
                        </label>
                        <input type="number" placeholder="0PHP" name="xamount" required>

                        <label for="tilt">
                            <b>Payee</b>
                        </label>
                        <input type="text" placeholder="" name="xpayee" required>

                        <label for="budget">
                            <b>Budget</b><br>
                        </label>
                        <select name="budgetid" class="stat">
                            <?php foreach ($budget_options as $option) { ?>
                                <option value="<?php echo $option['budgetid']; ?>"><?php echo $option['bname']; ?></option>
                            <?php } ?>
                        </select>

                        <label for="due">
                            <b>Plan Due Date</b>
                        </label>
                        <br>
                        <input type="date" id="due" name="xdate">

                        <div class="clearfix">
                            <button type="submit" name="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><b>Add Payment</b></button>
                        </div>
                    </div>
                </form>
            </div>

    </section>
    <?php
    echo '<script src="../scripts/nav.js"></script>
  </script>';
    echo '<script src="../scripts/planned.js">
  </script>';
    ?>
    <script>
        <?php include '../scripts/planned.js'; ?>
    </script>
</body>

</html>