<?php
  Include('store_template_start.php');
?>

<?php
//session_start();
$user_name = $_SESSION['txtUsername'];
if(!isset($user_name)) {
    header("location:index.php");
} else {
  Include('connect.php');
}
?>


			<div class="maincol">

<?php
echo "<h2> Welcome $user_name </h2>";

if (isset($_SESSION['status_message'])) {
  echo $_SESSION['status_message'];
  $_SESSION['status_message'] = "";
}

echo "<h2> Personal Information [<a href=\"update.php\">Update</a>] </h2>";
$personal_info_query = "SELECT * from CUSTOMER WHERE userid = '$user_name'";
$personal_info = pg_exec($link, $personal_info_query);
while($row=pg_fetch_assoc($personal_info)) {
  $firstname = $row['firstname'];
  $middlename = $row['middlename'];
  $lastname = $row['lastname'];
  $birthdate = $row['birthdate'];
  $address = $row['customeraddress'];
  $email = $row['personal_emailid'];
}
?>
<div align="left">
<table width="500" border="1">
<tr>
<td><label>First Name</label></td>
<td><label><?php echo $firstname ?></label></td>
</tr>
<tr>
<td><label>Middle Name</label></td>
<td><label><?php echo $middlename?></label></td>
</tr>
<tr>
<td><label>Last Name</label></td>
<td> <label><?php echo $lastname?></label></td>
</tr>
<tr>
<td><label>Birth date</label></td>
<td> <?php echo $birthdate?></td>
</tr>
<tr>
<td><label>Address</label></td>
<td> <?php echo $address ?></td>
</tr>
<tr>
<td><label>Email</label></td>
<td> <?php echo $email ?></td>
</tr>
<tr>
</table>


<?php
echo "<br><br><br><br>";
echo "<h2> Billing Information [<a href=\"update.php\">Add/Update</a>]</h2>";
Include('connect.php');
$query = "select * from creditcards where userid = '$user_name'";
$results = pg_exec($link, $query);
while($row = pg_fetch_assoc($results)) {
  $card_num = $row['cardno'];
  echo "<table border=\"1\" width=\"700\">";
  echo "<tr>";
  echo "<td>", $row['cardno'], "</td> <td>", $row['cardtype'], "</td><td>", $row['cardexpiration'], "</td><td>", $row['billingaddress'], "</td> <td>";
  echo "<form action=\"delete_card.php\" method=\"post\">";
  echo "<input type=\"submit\", name=\"delete[$card_num]\" value=\"Delete\">";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
}
?>
</div>

<?php
echo "<br><br><br><br>";
echo "<h2> Previous Transactions </h2>";
Include('print.php');
$transactions_query = "
SELECT *
FROM transaction, transaction_booklog, book
WHERE transaction.transactionid = transaction_booklog.transactionid
      AND book.book_isbn = transaction_booklog.book_isbn AND userid = '$user_name'
      ORDER by date_of_purchase desc";
$transactions = pg_exec($link, $transactions_query);

while($row=pg_fetch_assoc($transactions)) {
  echo "On ", $row["date_of_purchase"], ", you purchased";
  $bookid = $row['book_isbn'];
  $author = pg_exec($link, "select firstname, middlename, lastname, book_isbn from writes where book_isbn = '$bookid'");
  printBookArray($row, $author);
  /*echo "<form action=\"add_review.php\" method=\"post\">";
  echo "<input type=\"submit\", name=\"review[$bookid]\" value=\"review\">";
  echo "</form>";
  echo "<hr>";*/
}
?>

</div> <!-- end main content -->

<?php
  Include('store_template_end.php');
?>
