


<?php
session_start();
$user_name = $_SESSION['txtUsername'];
if (!isset($user_name)) {
  header("location:index.php");
}
$old_pwd = $_REQUEST['old_password'];
$new_pwd = $_REQUEST['new_password'];
$re_new_pwd = $_REQUEST['re_new_password'];
$session_pwd = $_SESSION['txtPassword'];

if ($session_pwd == $old_pwd) {
	if ($new_pwd == $re_new_pwd) {
		$link = pg_Connect("host=localhost dbname=Lelivre user=postgres password=postgres");
		// Write query to update the password here.
		$query = " update customer set userpassword = '$new_pwd' where userpassword = '$old_pwd' and userid = '$user_name' ";
		$result = pg_query($link, $query) or die('Query failed: ' . pg_last_error());
		$rows = pg_affected_rows($result);
		if ($rows == 1) {
			echo "Successfully changed password";

			// Change the session password.
			$_SESSION['txtPassword'] = $new_pwd;
			$_SESSION['status_message'] = "Password successfully updated";
			header("location:control_panel.php");
		} else {
			$_SESSION['status_message'] = "<h2 style=\"color:#ff0000\">Wrong password or User does not exist";
			header("location:control_panel.php");
		}
  } else {
		$_SESSION['status_message'] = "Passwords don't match";
		header("location:control_panel.php");
  }
} else {
  $_SESSION['status_message'] = "Incorrect password.";
  header("location:control_panel.php");
}
?>

<html>
<head>
<title>User Control Panel</title>
</head>
<body>

</body>
</html>
