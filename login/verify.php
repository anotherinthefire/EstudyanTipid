
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once('../components/config.php');

// Function to generate random token
function generateToken($length = 32) {
    if(function_exists('openssl_random_pseudo_bytes')) {
        $token = bin2hex(openssl_random_pseudo_bytes($length));
    } else {
        $token = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
    }
    return $token;
}

// If form is submitted
if(isset($_POST['signup'])) {
  // Get values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if email or username already exists
  $email_exists_query = "SELECT * FROM user WHERE email='$email'";
  $username_exists_query = "SELECT * FROM user WHERE username='$username'";

  $email_exists_result = mysqli_query($conn, $email_exists_query);
  $username_exists_result = mysqli_query($conn, $username_exists_query);

  if(mysqli_num_rows($email_exists_result) > 0) {
    // Email already exists
    echo "<script>alert('Email already exists');</script>";
  } else if(mysqli_num_rows($username_exists_result) > 0) {
    // Username already exists
    echo "<script>alert('Username already exists');</script>";
  } else {
    // Generate a unique token
    $token = generateToken();

    // Insert user data into database
    $query = "INSERT INTO user (first_name, last_name, email, username, password, token) VALUES ('$first_name', '$last_name', '$email', '$username', '$password', '$token')";
    $result = mysqli_query($conn, $query);

    if($result) {
      // Send verification email
      require_once "../vendor/autoload.php";

      // Initialize PHPMailer object
      $mail = new PHPMailer(true);

      // Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'rongodfreyultra@gmail.com';                     //SMTP username
      $mail->Password   = 'mxsd sjen asbr wkit';                              //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients remove before commit
      $mail->setFrom('rongodfreyultra@gmail.com', 'EstudyanTipid');
      $mail->addAddress($email);     //Add a recipient
      //$mail->addAddress('ellen@example

    $mail->addReplyTo('rongodfreyultra@gmail.com', 'Estudyantipid');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('assets/mail/logo.png');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $email_subject = 'Verify Your Account';
    $mail_body = 'Click the link below to reset your password: <br>' .
      '<a href="http://localhost/master/EstudyanTipid/login/Login.php?token=' . $token . '">Verify Account</a>';


    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $email_subject;
    $mail->Body    = $mail_body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()) {
      // Redirect to verification page
      header('Location: Login.php');
      exit;
    } else {
      // Verification email failed to send
      echo "<script>alert('Verification email failed to send');</script>";
    }
  } else {
    // User data failed to insert into database
    echo "<script>alert('User data failed to insert into database');</script>";
  }
}
} ?>
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
