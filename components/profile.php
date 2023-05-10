<?php
include_once('../components/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Estudyantipid | Profile </title>
  <link rel="shortcut icon" href="https://i.ibb.co/2KsCsg8/Estudyan-Tipid-logo-white.png">
  <?php
  echo "<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>";
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  ?>

  <style>
    <?php include '../style/profile.css'; ?><?php include '../style/style.css'; ?>
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
      <table class="container">
        <tr>

        
          <th>
            <?php
            if (isset($_POST['profile'])) {
              $user_id = $_SESSION['userid'];

              // Check if a file has been uploaded
              if ($_FILES['image']['name'] != "") {
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if the file is a valid image
                $check = getimagesize($_FILES['image']['tmp_name']);
                if ($check === false) {
                  $error_msg = "File is not an image.";
                    echo "<script>window.alert('$error_msg');</script>";
                } else {
                  // Check if the file already exists and rename it if necessary
                  $i = 1;
                  while (file_exists($target_file)) {
                    $target_file = $target_dir . pathinfo($target_file, PATHINFO_FILENAME) . "_" . $i . "." . $imageFileType;
                    $i++;
                  }

                  // Upload the file
                  if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // Update the user's profile image in the database
                    $sql = "UPDATE user SET img='$target_file' WHERE userid=$user_id";
                    if (mysqli_query($conn, $sql)) {
                    echo "<script>window.alert('Profile image updated successfully.');</script>";
                    } else {
                        echo "<script>window.alert('Error updating profile image: ' . mysqli_error($conn););</script>";
                    }
                } else {
                    echo "<script>window.alert('Error uploading file.');</script>";
                }
              }
                } else {
                    echo "<script>window.alert('Please select an image to upload.');</script>";
                }
              }                

            // Get the user's profile image filename
            $user_id = $_SESSION['userid'];
            $sql = "SELECT `img` FROM `user` WHERE `userid`=$user_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $imgFilename = $row["img"];


              if (isset($error_msg)) { ?>
                <div style="color: red;"><?php echo $error_msg; ?></div>
              <?php } ?>
              <?php if (isset($success_msg)) { ?>
                <div style="color: green;"><?php echo $success_msg; ?></div>
              <?php } ?>
              <form method="post" enctype="multipart/form-data">
                <div class="image-container">
                  <img src="../img/<?php echo $imgFilename; ?>" alt="Profile Image">
                  <div class="overlay">
                    <label for="image">
                      <i class="bx bx-camera"></i>
                      <input id="image" name="image" accept="image/*" type="file" />

                    </label>
                  </div>

                </div>
              <input type="submit" name="profile" value="change" style="width:50%; ">
            </form>
          </th>





          <?php
          if (isset($_SESSION['userid'])) {
            $id = $_SESSION['userid'];
            $sql = "SELECT * from user where userid = '$id'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              echo "            
            <th class='username'>
                <h1>" . $row['username'] . "</h1>
                <h5>" . $row['email'] . "</h5>           
            </th>";
            }
          }
          ?>

        </tr>
        <?php
        if (isset($_POST['newuser'])) {
          $new_username = $_POST['username'];
          $userid = $_SESSION['userid'];
          $sql = "UPDATE user SET username='$new_username' WHERE userid='$userid'";
          $result = $conn->query($sql);
          if ($result) {
            echo '<script>
     window.location.href = "profile.php";
   </script>
   ';
            exit;
          } else {
            echo '<script>
     window.location.href = "profile.php";
   </script>
   ';
            exit;
          }
        }
        ?>
        <?php
        if (isset($_SESSION['userid'])) {
          $id = $_SESSION['userid'];
          $sql = "SELECT * from user where userid = '$id'";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $current_username = $row['username'];
        ?>
            <tr class="two-button">
              <td>
                <button class="edit-button" id="myBtn">
                  Edit Profile >
                </button>
                <!-- edit profile -->
                <div id="myModal" class="modal">
                  <div class="modal-content">
                    <form method="post">
                      <!-- <span class="closee">&times;</span> -->
                      <!-- modal content -->
                      <h1>Edit Profile</h1>
                      <div class="edit-pro">
                        <label for="fname">
                          New username
                          <span class="req">
                            *
                          </span>
                        </label>
                        <input type="text" id="fname" name="username" placeholder="" value="<?php echo $current_username; ?>">
                      </div>
                      <input type="submit" value="Submit" name="newuser">
                      <input class="closee" type="button" value="Discard">
                    </form>

                  </div>
                </div>

              </td>

          <?php
          }
        }
          ?>






          <td>
            <button class="change-button" id="myBtnn">
              Change Password
            </button>

            <div id="myModall" class="modall">
              <div class="modall-content">
                <!-- <span class="closee">&times;</span> -->
                <!-- modal content -->
                <h1>Change Password</h1>



                <?php
$user_id = $_SESSION['userid'];

if (isset($_POST['passubmit'])) { // Check if the form has been submitted

    $new_password = $_POST['newpassword'];
    $confirm_password = $_POST['connewpassword'];
    
    if ($new_password == $confirm_password) { // Check if the passwords match
        $user_id = mysqli_real_escape_string($conn, $user_id);
        $new_password = mysqli_real_escape_string($conn, $new_password);
        $sql = "UPDATE `user` SET `password` = '$new_password' WHERE `userid` = '$user_id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        // Display a success message to the user
        echo "<script>alert('Password updated successfully.');</script>";

    } else {

        // Display an error message to the user
        echo "<script>alert('Passwords do not match.');</script>";

    }
}

?>

<form method="post" action="">
    <div class="chan-pass">
        <label for="new-password">
            New password
            <span class="req">*</span>
        </label>
        <input type="password" id="new-password" name="newpassword" placeholder="">

        <label for="confirm-new-password">
            Confirm new password
            <span class="req">*</span>
        </label>
        <input type="password" id="confirm-new-password" name="connewpassword" placeholder="">
    </div>

    <input type="submit" value="Change" name="passubmit">
    <input class="closeee" type="button" value="Discard">
</form>


              </div>
            </div>
          </td>
            </tr>
      </table>
    </div>
  </section>


  <?php
  echo '<script src="../scripts/nav.js"></script>
  </script>';
  echo '<script src="../scripts/profile.js">
  </script>';
  ?>
  <script>
    <?php include '../scripts/profile.js'; ?>
  </script>
</body>

</html>