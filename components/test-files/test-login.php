<?php
// Start the session and connect to the database
session_start();
$db = new mysqli('localhost', 'root', '', 'estudyantipid');

// If form is submitted
if(isset($_POST['login'])) {
    // Get values from form
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    // Query database for user with matching email or username and password
    $query = "SELECT * FROM user WHERE (email = '$login' OR username = '$login') AND password = '$password'";
    $result = mysqli_query($db, $query);
    
    // If user is found, log them in and redirect to dashboard page
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $user['userid'];
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        // If login credentials are invalid, display error message
        $error_message = "Invalid login credentials.";
    }
}
?>

<!-- Login form -->
<form method="post" action="">
    <label>Email or Username:</label>
    <input type="text" name="login" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <?php if(isset($error_message)) { echo "<p>$error_message $login $password</p>"; } ?>
    <button type="submit" name="login">Log In</button>
</form>