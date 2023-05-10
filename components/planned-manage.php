<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Estudyantipid | Manage Plans </title>
    <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <?php
    echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    ?>
    <style>
        <?php include '../style/planned-manage.css'; ?><?php include '../style/style.css'; ?>
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
        </ul>
    </div>

    <!--home-->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <h1 class="page-title">MANAGE PAYMENT</h1>
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

                            <th>
                           <div id="stat-<?php echo $row['exid'];?>" class="stat-modal">
                            <span onclick="document.getElementById('stat-<?php echo $row['exid'];?>').style.display='none'" class="close" title="Close Modal">&times;</span>

                            <!-- modal content -->
                            <form class="modal-content" action="pstatus.php?exid=<?php echo $row['exid'];?>" method="post">
                                <div class="container">
                                    <h1>
                                        Payment Done?
                                    </h1>
                                    <hr>

                                    <div class="clearfix">
                                        <button type="submit" name="status" onclick="document.getElementById('stat').style.display='none'" class="cancelbtn">
                                            <b>Yes</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                                <i class='bx bx-check' onclick="document.getElementById(`stat-<?php echo $row['exid'];?>`).style.display='block'" style="width:auto;"></i>
                            </th>
                        </tr>
                        <tr>
                            <td>Budget: <?php echo $row['budgetid']; ?></td>
                            
                            <td></td>
                            <td style="text-align: right; font-weight: normal;">
                                <span style="color:#17CF26; padding-right:10px;">
                                    Item Price:
                                </span>
                                ₱<?php echo $row['xamount']; ?>
                            </td>
                            <td style="text-align: center;">
                            
                                <i class='bx bx-edit' class="edit" onclick="document.getElementById(`id01-<?php echo $row['exid'];?>`).style.display='block'" style="width:auto;"></i></i>
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
                            <td style="text-align: center;">
                            
                                <i class='bx bx-trash' onclick="document.getElementById(`del-<?php echo $row['exid'];?>`).style.display='block'" style="width:auto;"></i>
                            </td>
                        </tr>
                    </table>
                </div>
                
    <?php
            }
        }?>
        

        
        <?php
    }
    ?>
            <div class='budget-details'>
        <table style='width:100%'>
            <tr>
                <th style='text-align: left; font-weight: normal;'>Total Price</th>
                <th style='text-align: center; font-weight: normal;'></th>
                <th style='text-align: right; font-weight: normal;'>
                        
                    ₱<?php 
                    if($total_budget === 0)
                    {
                         echo (0);                       
                    } 
                    ?>
                </th>
                <th></th>
            </tr>
        </table>
    </div>
    
</div>


            <?php
            $query = "SELECT * FROM expenses WHERE status ='on-going' and userid =" . $_SESSION['userid'] . " ORDER BY exid ASC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if (isset($_SESSION['userid'])) {
                        //get available budgets for the user
                        $budget_query = "SELECT * FROM budget WHERE budget_status ='' and userid =" . $_SESSION['userid'] . " ORDER BY budgetid ASC";
                        $budget_result = mysqli_query($conn, $budget_query);
                        $budget_options = '';
                        while ($budget_row = mysqli_fetch_array($budget_result)) 
                        {
                            $budget_options .= '<option value="' . $budget_row['budgetid'] . '"';
                            if ($budget_row['budgetid'] == $row['budgetid']) 
                            {
                                $budget_options .= ' selected="selected"';
                            }
                            $budget_options .= '>' . $budget_row['bname'] . ' - ' . $budget_row['budget'] . ' PHP</option>';
                        }
            ?>
                        <div id="id01-<?php echo $row['exid'];?>" class="modal">
                            <span onclick="document.getElementById('id01-<?php echo $row['exid'];?>').style.display='none'" class="close" title="Close Modal">&times;</span>

                            <!-- modal content -->
                            <form class="modal-content" action="pupdate.php?exid=<?php echo $row['exid']; ?>" method="post">
                                <div class="container">
                                    <h1>Edit Payment</h1>
                                    <hr>
                                    <label for="tilt">
                                        <b>Title of Plan</b>
                                    </label>
                                    <input type="text" placeholder="" name="xname" value="<?php echo $row['xname']; ?>" required>

                                    <label for="budget">
                                        <b>Select Budget</b>
                                    </label>

                                    <label for="xamount">
                                        <b>Enter Amount</b>
                                    </label>
                                    <input type="number" placeholder="0PHP" name="xamount" value="<?php echo $row['xamount']; ?>" required>

                                    <label for="tilt">
                                        <b>Payee</b>
                                    </label>
                                    <input type="text" placeholder="" name="xpayee" value="<?php echo $row['xpayee']; ?>" required>

                                    <label for="due">
                                        <b>Plan Due Date</b>
                                    </label>
                                    <br>
                                    <input type="date" id="due" name="xdate" value="<?php echo $row['xdate']; ?>">
                                    <br>
                                    <label for="budget">
                                        <b>Budget</b><br>
                                    </label>
                                    <select name="budgetid" class="stat">
                                        <?php echo $budget_options; ?>
                                    </select>
                                    <br>
                                    <label for="status">
                                        <b>Status</b>
                                    </label>
                                    <br>
                                    <select name="status" id="status" class="stat">
                                        <option id="not-done" <?php if ($row['status'] == 'on-going') echo 'selected="selected"'; ?>>ON-GOING</option>
                                        <option id="paid" <?php if ($row['status'] == 'paid') echo 'selected="selected"'; ?>>PAID</option>
                                    </select>

                                    <div class="clearfix">
                                        <button type="submit" name="edit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                                            <b>Edit</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
            <?php
                    }
                }
            }
            ?>

            <?php
            $query = "SELECT * FROM expenses WHERE status ='on-going' and userid =" . $_SESSION['userid'] . " ORDER BY exid ASC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    if (isset($_SESSION['userid'])) {
            ?>
                        <div id="del-<?php echo $row['exid'];?>" class="del-modal">
                            <span onclick="document.getElementById('del-<?php echo $row['exid'];?>').style.display='none'" class="close" title="Close Modal">&times;</span>

                            <!-- modal content -->
                            <form class="modal-content" action="pdelete.php?exid=<?php echo $row['exid']; ?>" method="post">
                                <div class="container">
                                    <h1>
                                        Delete Payment?
                                    </h1>
                                    <hr>

                                    <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
                                                <input type="text" placeholder="Repeat Password" name="psw-repeat" required> -->
                                    <div class="clearfix">
                                        <button type="submit" name="delete" onclick="document.getElementById('del').style.display='none'" class="cancelbtn">
                                            <b>DELETE</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <?php
            $query = "SELECT * FROM expenses WHERE status ='on-going' and userid =" . $_SESSION['userid'] . " ORDER BY exid ASC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    if (isset($_SESSION['userid'])) {
            ?>
                        <!-- change status -->
                        <!-- delete modal -->
                        <div id="stat" class="stat-modal">
                            <span onclick="document.getElementById('stat').style.display='none'" class="close" title="Close Modal">&times;</span>

                            <!-- modal content -->
                            <form class="modal-content" action="pstatus.php?exid=<?php echo $row['exid'];?>" method="post">
                                <div class="container">
                                    <h1>
                                        Payment Done?
                                    </h1>
                                    <hr>

                                    <div class="clearfix">
                                        <button type="submit" name="status" onclick="document.getElementById('stat').style.display='none'" class="cancelbtn">
                                            <b>Yes</b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
            <?php
                    }
                }
            }
            ?>







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