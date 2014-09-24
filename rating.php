<?php
session_start();
$user_name = $_SESSION['txtUsername'];
if (!isset($user_name)) {
  header("location:index.php");
}
$link = pg_Connect("host=localhost dbname=Lelivre user=postgres password=postgres");
$rate = $_POST['rate'];
$text_review = $_POST['review'];
echo $rate;
echo $text_review;
$query = "select max(ratingid) as max_id from rating";
$result = pg_query($link, $query) or die('Query failed: ' . pg_last_error());
while($row = pg_fetch_array($result)){
  $total = $row["max_id"];
}
$num_ratings = $total + 1;
$book_isbn = $_SESSION['book_to_review'];
$query = "insert into rating values (
          $num_ratings,
          $rate,
          '$text_review',
          NULL,
          NULL,
          NULL,
          '$book_isbn',
          '$user_name')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$rows = pg_affected_rows($result);

if ($rows == 1) {
  echo "Successfully changed $new_infoattribute";
  $_SESSION['status_message'] = "Successfully added review.";
  header("location:control_panel.php");
} else {
  echo "Wrong password or User does not exist";
}

?>

<html>
<head>
<title>Add Review</title>
</head>
<body>

</body>
</html>
