<?php
// Start the session

// Check if the user is logged in


// Include the database configuration file
include "config.php";
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
  }
// Check if the form has been submitted
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
          $success_msg = "Profile image updated successfully.";
        } else {
          $error_msg = "Error updating profile image: " . mysqli_error($conn);
        }
      } else {
        $error_msg = "Error uploading file.";
      }
    }
  } else {
    $error_msg = "Please select an image to upload.";
  }
}

// Get the user's profile image filename
$user_id = $_SESSION['userid'];
$sql = "SELECT `img` FROM `user` WHERE `userid`=$user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$imgFilename = $row["img"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Profile Image</title>
</head>
<body>
  <h1>Update Profile Image</h1>
  <?php if (isset($error_msg)) { ?>
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
          Choose an image
        </label>
        <input type="file" id="image" name="image" accept="image/*" style="display: none;">
      </div>
    </div>
    <br>
    <input type="submit" name="profile" value="Update Profile Image">
  </form>
</body>
</html>
