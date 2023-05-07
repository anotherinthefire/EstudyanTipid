<?php
include_once('../components/config.php');

// if(isset($_POST['login'])) {
//     $login = $_POST['login'];
//     $password = $_POST['password'];
//     $query = "SELECT * FROM user INNER JOIN wallet ON user.walletid = wallet.walletid WHERE ".$_SESSION['userid']." ";

//     $result = mysqli_query($conn, $query); 
//     print_r($result);    
//     if(mysqli_num_rows($result) == 1) {
        
       
//     } else {

//         $error_message = "Invalid login credentials.";
//     }  
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> EstudyanTipid | Wallet Dashboard </title>
    <link rel="icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
    <link rel="stylesheet" href="../style/wallet.css">
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
            <span class="text"></span>
        </div>
         <div class='containers'>
        <!--3 white container-->
        <?php
            
            if (isset($_SESSION['userid']))
                {
                    $id = $_SESSION['userid'];
                    $sql = "SELECT * from user where userid = '$id'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                       {                                                                           
                         echo"                           
                                <div class='container-1'>
                                    <h1>Balance</h1>
                                    <label>PHP ".$row['balance']."</label>
                                </div>";
                       }
                }

            ?>
            <?php 
			if(isset($_SESSION['userid']))
						{	
						$query = "SELECT COUNT(*) AS AllItem FROM goal where userid =".$_SESSION["userid"]."";
							$result = mysqli_query($conn, $query);
							if(mysqli_num_rows($result) > 0)
							{
								while ($row = mysqli_fetch_array($result))
								 {
									echo "<div class='container-2'>
                                          <h1>Goals</h1>
                                          <label>".$row['AllItem']."</label>
                                          </div>";
									
								 }
							}
						}
							else
							{
								echo "<div class='container-2'
                                      <h1>Goals</h1><br>
                                      <label>Goal(0)</label>
                                      </div>";
							}

					?>	
             <?php 	
                    		
                    $query = "SELECT * FROM budget WHERE budget_status = 'expired' and userid =".$_SESSION['userid']."";                              
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
                            echo "<div class='container-3'>
                            <h1>Budget Remaining</h1>
                            <label style='color: #17CF26;'>PHP <?php echo  number_format(($budgetSavings - $totalExpenses),2);?></label>
                            </div>";
                         }
                        
                    }
                    else
                    {
                       echo "<div class='container-3'>
                       <h1>Budget Remaining</h1>
                       <label style='color: #17CF26;'>PHP 0</label>
                       </div>";
                    }
                    foreach ($budgets as $key => $row) {
                        if (isset($_SESSION['userid']))
                        { 
                        $budgetSavings = (int) $row["budget"];                            
                        
                        }
                    ?>
        
            <!-- <div class="container-3">
                <h1>Budget Remaining</h1>
                <label style="color: #17CF26;">PHP 0</label>
            </div> -->
            <?php
                            
                        }
                    ?>
        </div>
    </section>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html>