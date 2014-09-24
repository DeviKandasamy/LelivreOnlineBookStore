	<?php
		Include('store_template_start.php');
		Include('connect.php');
		$total = htmlspecialchars($_GET["tot"]);
		$user = $_SESSION['txtUsername'];
		//echo $user;
		$customer_details = pg_exec($link, "Select * from customer where userid='$user'");
		$customer = pg_fetch_array($customer_details, 0);
		$card_details = pg_exec($link, "Select * from creditcards where userid='$user'");
		$numcard = pg_numrows($card_details);
		//echo $customer['customeraddress'];		
	?>
						
			<div class="maincol">
				<div class="aside left">
					<div class="page-title">
						<h2> Continue with payment </h2>
					</div>
					<div class="aside left">
						<div class="box-wrapper">
						
							<?php
							echo "<FORM  action=\"ordercancelled_confirmed.php\", method = \"post\" >";
							echo "<table style=\"width:500px\">";
								
							
							//<form action="post" method="get" name="checkout">
							
									echo "<tr>";
									echo "<td>Total Amount</td>";
									echo "<td><b>$",$total,"</b></td>";
									echo "</tr><tr>";
									echo "<td>Customer Name</td>";
									echo "<td>",$customer['firstname'],$customer['middlename'], $customer['lastname'],"</td>";
									echo "</tr><tr>";
									echo "<td>Shipping Address:  </td>";
									echo "<td>",$customer['customeraddress'],"</td>";
									echo "</tr><tr>";
									echo "<td>Email Address</td>";
									echo "<td>",$customer['personal_emailid'],"</td>";
									echo "</tr><tr>";	
									echo "<td>Select card type</td>";
									echo "<td>";
									echo "<select name = \"creditcard\" id=\"card_type\">";
									for($rowindex = 0; $rowindex < $numcard; $rowindex++) {
									$row_card = pg_fetch_array($card_details, $rowindex);
											echo "<option value=", $row_card['cardno'],">", $row_card["cardno"],"(",$row_card["cardtype"],")","</option>";
									}
									echo "</select>";
									echo "</td>	";
									echo "</tr><tr>";															
																	
									echo "<td><input type =\"hidden\" name =\"tot_amt\" value=\"",$total,"\"/></td>"; 
									echo "</tr>";
									echo "<script>
											window.onload = function() {
											document.getElementById('card_no').onchange = disablefield;
											document.getElementById('card_yes').onchange = disablefield;
											}
											function disablefield()
											{
											if ( document.getElementById('card_no').checked == true ){
											document.getElementById('creditcard').value = '';
											document.getElementById('creditcard').disabled = true}
											else if (document.getElementById('card_yes').checked == true ){
											document.getElementById('creditcard').disabled = false;}
											}
								</script>";
								    echo "</table>";
									echo "<input name=\"cancel\" style=\"float:right; margin: 50px 100px 0px 0px;\" type=\"submit\"  value=\"Cancel transaction\" tabindex=\"4\" >";
									echo "<input name=\"order\" style=\"float:right; margin: 50px 125px 0px 0px;\" type=\"submit\"  value=\"Place Order\" tabindex=\"4\" >";
									echo "<br><br><br><br><br>";
									echo "</FORM>";
								//	<a href="orderconfirmed.php? tot=<?php echo $total; 
								?>
				
							
								
							
						</div> 
	
				<?php
						Include('store_template_end.php');
				?>