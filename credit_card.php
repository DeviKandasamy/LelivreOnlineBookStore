<?php
session_start();
$user_name = $_SESSION['txtUsername'];
if (!isset($user_name)) {
    header("location:index.php");
}
$pwd = $_REQUEST['password'];
$session_pwd = $_SESSION['txtPassword'];

if ($session_pwd == $pwd) {
  $link = pg_Connect("host=localhost dbname=Lelivre user=postgres password=postgres");

  // Write query to insert into creditcards table.
  $query = "insert into creditcards values (
    '".$_REQUEST['credit_card_number']."',
    '".$_REQUEST['card_type']."',
    '".$_REQUEST['card_expiration_date']."',
    '".$_REQUEST['billing_address']."',
    '$user_name'
  )";
  $result = pg_query($link, $query) or die('Query failed: ' . pg_last_error());
  $rows = pg_affected_rows($result);
	if ($rows == 1) {
		$_SESSION['status_message'] = "Credit card successfully added";
		header("location:control_panel.php");
	} else {
		$_SESSION['status_message'] = "Wrong password or User does not exist";
		header("location:control_panel.php");
	}
} else {
	$_SESSION['status_message'] =  "<h2 style=\"color:#ff0000\"> Wrong password. </h2>";
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
