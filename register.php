<?php
  Include('store_template_start.php');
?>

<div align="center">
<h3> REGISTER </h3> <br>

<form name="registration" method="post" action="registration.php">
<table width="400">
<tr>
<td><label>First Name</label></td>
<td><input type="text" name="fname" value=""></td>
</tr>
<tr>
<td><label>Middle Name</label></td>
<td><input type="text" name="mname" value=""></td>
</tr>
<tr>
<td><label><b>Last Name</b></label></td>
<td><input type="text" name="lname" value=""></td>
</tr>
<tr>
<td><label>Birth date</label></td>
<td><input type="date" name="bdate" value=""></td>
</tr>
<tr>
<td><label>Address</label></td>
<td><input type="text" name="address" value=""></td>
</tr>
<tr>
<td><label><b>Email</b></label></td>
<td><input type="text" name="email" value=""></td>
</tr>
<tr>
<td><label><b>Password</b></label></td>
<td><input type="password" name="password" value=""></td>
</tr>
<tr>
<td><label><b>Re-Password</b></label></td>
<td><input type="password" name="repassword" value=""></td>
</tr>
<tr>
<th colspan="2"><input type="submit" name="submit" value="SUBMIT"></th>
</tr>
</table>
</form>
</div>

<?php
	Include('store_template_end.php');
?>
