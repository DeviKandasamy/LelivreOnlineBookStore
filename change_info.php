<?php
session_start();
$user_name = $_SESSION['txtUsername'];
if (!isset($user_name)) {
    header("location:index.php");
}
$password = $_POST['password'];

if ($password == $_SESSION['txtPassword']) {
	$new_value = $_POST['new_value'];
	$new_infoattribute = $_POST['taskOption'];
  Include('connect.php');

	// Write query to update the name here.
  $query = " update customer set $new_infoattribute ='$new_value' where userid = '$user_name' ";
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());
  $rows = pg_affected_rows($result);

	if ($rows == 1) {
		echo "Successfully changed $new_infoattribute";
		$_SESSION['status_message'] = "$new_infoattribute successfully updated";
		header("location:control_panel.php");
	} else {
		$_SESSION['status_message'] = "<h2 style=\"color:#ff0000\">Wrong password or User does not exist";
		header("location:control_panel.php");
	}
} else {
	$_SESSION['status_message'] = "<h2 style=\"color:#ff0000\">Wrong password";
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
