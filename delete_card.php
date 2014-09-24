<?php
session_start();
$user_name = $_SESSION['txtUsername'];
if (!isset($user_name)) {
    header("location:index.php");
}

if ($session_pwd == $old_pwd) {
  $link = pg_Connect("host=localhost dbname=Lelivre user=postgres password=postgres");
  // Write query to delete the credit card.

  $credit_card_to_delete = key($_POST['delete']);
  $query = " delete from creditcards where cardno = '$credit_card_to_delete' ";
  $result = pg_query($link, $query) or die('Query failed: ' . pg_last_error());
  $rows = pg_affected_rows($result);
	if ($rows == 1) {
		echo "Successfully changed password";
    $_SESSION['status_message'] = "Credit card deleted";
    header("location:control_panel.php");
	} else {
		echo "Wrong password or User does not exist";
	}
} else {
  echo "Passwords don't match";
}
?>

<html>
<head>
<title>User Control Panel</title>
</head>
<body>

</body>
</html>
