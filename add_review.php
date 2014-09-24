<?php
Include('store_template_start.php');
// session_start();
$_SESSION['book_to_review'] = htmlspecialchars($_GET["isbn"]);
$book_select = $_SESSION['book_to_review'];
Include('connect.php');
$book = pg_exec($link,  "SELECT * from book where book_isbn = '$book_select'");
$author = pg_exec($link, "select firstname, middlename, lastname, book_isbn from writes where book_isbn = '$book_select'");
?>

<div class="maincol">
<?php
echo "<h2> Add Review </h2>";
Include('print.php');
while($row=pg_fetch_assoc($book)) {
  printBookArray($row, $author);
}
?>

<html lang ="en">
<head>
	<title>Add Review</title>
	<meta charset ="utf-8">
	<link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<br>
<?php echo "<h2> $book_select </h2>"?>
<br>
<h3> RATINGS: </h3>
<form name="rating" method="post" action="rating.php">
<br> 1<input type="range" name ="rate" min="1" max="5"> 5<br><br>
<h3>Review:</h3><br><textarea name="review" rows="5" cols = "40"></textarea>
<br><br>
<input type="submit" value="SUBMIT" name="">
</form>
</body>
</html>
					<?php
						Include('store_template_end.php');
					?>
