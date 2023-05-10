<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> EstudyanTipid | Wallet Dashboard </title>
    <link rel="icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <link rel="stylesheet" href="../style/wallet.css?<?php time() ?>">
    <!-- Boxiocns CDN Link / search lang boxicons sa googol -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <span class="text"></span>
        </div>
        <div class='containers'>
            <!--3 white container-->


            <?php
            if (isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];
                $sql = "SELECT * from user where userid = '$id'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $current_balance = $row['balance'];
            ?>

                    <div class='container-1' id="balance-container">
                        <h1>Balance</h1>
                        <label>PHP <?php echo $current_balance; ?></label>
                    </div>

                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                        <!-- modal content -->
                        <form class="modal-content" action="update-balance.php" method="post">
                            <div class="container">
                                <h1>Balance</h1>
                                <hr>
                                <input type="number" placeholder="0PHP" name="budget" value="PHP 0" required>

                                <div class="clearfix">
                                    <button type="submit" name="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><b>Add Balance</b></button>
                                </div>
                            </div>
                        </form>
                    </div>

            <?php
                }
            }
            ?>











            <?php
            if (isset($_SESSION['userid'])) {
                $query = "SELECT COUNT(*) AS AllItem FROM goal where userid =" . $_SESSION["userid"] . "";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='container-2'>
                                          <h1>Goals</h1>
                                          <label>" . $row['AllItem'] . "</label>
                                          </div>";
                    }
                }
            } else {
                echo "<div class='container-2'
                                      <h1>Goals</h1><br>
                                      <label>Goal(0)</label>
                                      </div>";
            }








            // Retrieve the total budget for the current user
            $query = "SELECT SUM(budget) AS total_budget FROM budget WHERE userid =" . $_SESSION['userid'] . " AND budget_status = ''";
            $result = mysqli_query($conn, $query);
            $budget = mysqli_fetch_assoc($result);

            // Retrieve the total expenses for the selected budget
            $query = "SELECT SUM(xamount) AS total_expenses FROM expenses WHERE userid =" . $_SESSION['userid'] . " AND status = 'PAID'";
            $result = mysqli_query($conn, $query);
            $expenses = mysqli_fetch_assoc($result);

            // Calculate the remaining budget by deducting the total expenses from the total budget
            $remaining_budget = $budget['total_budget'] - $expenses['total_expenses'];

            echo "<div class='container-3'>
                    <h1>Total Budget Remaining</h1>";
            echo "<label style='color: #17CF26;'>PHP " . $remaining_budget . "</label>";
            echo "</div>";
            ?>
            ?>








        </div>
    </section>

    </section>
    <script src="../scripts/nav.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // Get the balance container
        var balanceContainer = document.getElementById('balance-container');

        // When the balance container is clicked, display the modal
        balanceContainer.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>