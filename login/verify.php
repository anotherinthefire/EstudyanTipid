
<?php
// Start the session and include the database connection
require_once '../components/config.php';

// Check if the verification token and user ID are set in the URL
if (isset($_GET['token'], $_GET['userid'])) {
    // Retrieve the verification token and user ID from the URL
    $token = $_GET['token'];
    $user_id = $_GET['userid'];

    // Retrieve the user data from the database
    $query = "SELECT * FROM user WHERE userid = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result === false) {
        // Set an error message
        $_SESSION['error_message'] = 'An error occurred while verifying your email address. Please try again.';

        // Redirect the user to the signup page
        header('Location: signup.php');
        exit;
    }

    $user = mysqli_fetch_assoc($result);

    // Verify that the user ID and verification token match
    if ($user && $user['verification_token'] == $token) {
        // Update the user's status to "active"
        $update_query = "UPDATE user SET status = '1' WHERE userid = '$user_id'";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            // Set a success message
            $_SESSION['success_message'] = 'Your email address has been verified. Please login to continue.';

            // Redirect the user to the login page
            header('Location: Login.php');
            exit;
        } else {
            // Set an error message
            $_SESSION['error_message'] = 'An error occurred while verifying your email address. Please try again.';

            // Redirect the user to the signup page
            header('Location: signup.php');
            exit;
        }
    } else {
        // Set an error message
        $_SESSION['error_message'] = 'Invalid verification token. Please check your email and try again.';

        // Redirect the user to the signup page
        header('Location: signup.php');
        exit;
    }
} else {
    // Set an error message
    $_SESSION['error_message'] = 'Invalid URL. Please check your email and try again.';

    // Redirect the user to the signup page
    header('Location: signup.php');
    exit;
}
