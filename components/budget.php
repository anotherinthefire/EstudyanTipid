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
            <li>
                <a href="profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="profile.php">Profile</a></li>
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
                            <th style="text-align: left; font-weight: normal;">
                                Personal Expenses
                            </th>
                            <th style="text-align: center; font-weight: normal;">
                                As of (Date)
                            </th>
                            <th style="text-align: right; font-weight: normal;">
                                ₱5000
                            </th>
                        </tr>
                        <tr>
                            <td style="padding-top:20px; "></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                ₱4000<span style="color:#FF0000; padding-left:10px;">Budgeted Deductions</span>
                            </td>
                            <td></td>
                            <td style="text-align: right;">
                                <span style="color:#17CF26; padding-right:10px">Budgeted Savings</span> ₱1000
                            </td>
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

                        <label for="tilt">
                            <b>Title of Budget</b>
                        </label>
                        <input type="text" placeholder="" name="tilt" required>

                        <label for="bud">
                            <b>Enter Budget</b>
                        </label>
                        <input type="number" placeholder="0PHP" name="bud" required>

                        <label for="period">
                            <b>Period</b>
                        </label>
                        <br>
                        <select name="period" id="period" class="period">
                            <option id="day">day</option>
                            <option id="week">week</option>
                            <option id="month">month</option>
                        </select>
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
    echo '<script src="../scripts/budget.js">
  </script>';
    ?>
    <script>
        <?php include '../scripts/budget.js'; ?>
    </script>
</body>

</html>