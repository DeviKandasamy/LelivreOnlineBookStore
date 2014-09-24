<?php
Include('store_template_start.php');
?>

<?php
//session_start();
$user_name = $_SESSION['txtUsername'];
if(!isset($user_name)) {
    header("location:index.php");
} else {
  $link = pg_Connect("host=localhost dbname=Lelivre user=postgres password=postgres");
  $genres = pg_exec($link, "select distinct genre_name from genre order by genre_name;");
  $numgenres = pg_numrows($genres);
}
?>


			<div class="maincol">
<h3> UPDATE ACCOUNT INFORMATION </h3> <br>
<b>Change password</b>
<form name="change_password" method="post" action="change_password.php"></br>
<table width="400">
<tr>
<td><label>Old Password</b></label></td>
<td><input type="password" name="old_password" value=""></td>
</tr>
<tr>
<td><label>Password</b></label></td>
<td><input type="password" name="new_password" value=""></td>
</tr>
<tr>
<td><label>Re-Password</b></label></td>
<td><input type="password" name="re_new_password" value=""></td>
</tr>
<tr>
<th colspan="2"><input type="submit" name="SUBMIT" value="SUBMIT"></th>
</tr>
</table>
</form>

<br><br><br>

<b>Change information</b>
<form name="change_info" method="post" action="change_info.php">
<table width="400">

<tr>
<td><label>Password</b></label></td>
<td><input type="password" name="password" value=""></td>
</tr>

<tr>
<td>
<select name = "taskOption">
  <option value="FirstName">Name</option>
  <option value="personal_emailid">Email</option>
  <option value="customeraddress">Address</option>
</select>
</td>
<td>
NewValue:<input type="text" name="new_value" value=""></br>
<td>
</tr>

<tr>
<th colspan="2"><input type="submit" name="SUBMIT" value="SUBMIT"></th>
</tr>
</table>
</form>

<br><br><br>

<b>Add Billing information</b>
<form name="credit_card" method="post" action="credit_card.php">
<table width="400">
<tr>
<td><label>Password</b></label></td>
<td><input type="password" name="password" value=""></td>
</tr>
<tr>
<td><label>Credit Card Number</label></td>
<td><input type="text" name="credit_card_number" value=""></td>
</tr>
<th colspan="2">
<select name = "card_type">
  <option value="Amex">Amex</option>
  <option value="Discover">Discover</option>
  <option value="JCB">JCB</option>
  <option value="MasterCard">MasterCard</option>
  <option value="Visa">Visa</option>
</select>
</th>
<tr>
<td><label>Card Expiration</label></td>
<td><input type="date" name="card_expiration_date" value=""></td>
</tr>
<tr>
<td><label>Billing Address</label></td>
<td><input type="text" name="billing_address" value=""></td>
</tr>
<tr>
<th colspan="2"><input type="submit" name="submit" value="SUBMIT"></th>
</tr>


</table>
</form>

<?php
Include('store_template_end.php');
?>
