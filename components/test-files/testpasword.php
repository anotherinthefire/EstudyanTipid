<?php
include('../config.php');
$_SESSION["userId"] = $_SESSION["userid"];

if (!isset($_SESSION["userId"])) {
    header("Location: login.php");
    exit();
}

echo "User ID: " . $_SESSION["userId"];

if (isset($_POST["currentPassword"]) && isset($_POST["newPassword"])) {
    $sql = "SELECT * FROM user WHERE userid = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $_SESSION["userId"]);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();

    if (! empty($row)) {
        if (password_verify($_POST["currentPassword"], $row["password"])) {
            $newPassword = $_POST["newPassword"];
            $sql = "UPDATE user SET password = ? WHERE userid = ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('si', $newPassword, $_SESSION["userId"]);
            $statement->execute();
            $message = "Password Changed";
        } else {
            $message = "Current Password is not correct";
        }
    }
}

?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<script>
function validatePassword() {
    var currentPassword, newPassword, confirmPassword, output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if (!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
    }
    else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
    }
    if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
    }
    return output;
}
</script>

</head>
<body>
	<div class="phppot-container tile-container">
		<form name="frmChange" method="post" action=""
			onSubmit="return validatePassword()">

			<div class="validation-message text-center"><?php if(isset($message)) { echo $message; } ?></div>
			<h2 class="text-center">Change Password</h2>
			<div>
				<div class="row">
					<label class="inline-block">Current Password</label> <span
						id="currentPassword" class="validation-message"></span> <input
						type="password" name="currentPassword" class="full-width">

				</div>
				<div class="row">
					<label class="inline-block">New Password</label> <span
						id="newPassword" class="validation-message"></span><input
						type="password" name="newPassword" class="full-width">

				</div>
				<div class="row">
					<label class="inline-block">Confirm Password</label> <span
						id="confirmPassword" class="validation-message"></span><input
						type="password" name="confirmPassword" class="full-width">

				</div>
				<div class="row">
					<input type="submit" name="submit" value="Submit"
						class="full-width">
				</div>
			</div>

		</form>
	</div>
</body>
</html>