	<?php
		Include('store_template_start.php');
		Include('connect.php');
		$user = htmlspecialchars($_GET["id"]);
			
		/* Delete all rows from the FRUIT table */
		$count = pg_exec($link, "DELETE FROM shoppingcart WHERE userid='$user'");
		/* Return number of rows that were deleted */
		
		pg_close($link);
	?>
						
			<div class="maincol">
				<div class="aside left">
					<div class="page-title">
						<h2> Shopping Cart </h2>
					</div>
					
						 <b>Your cart is empty!!!</b>
						 <b>Click<a href="books.php"> here </a> to continue shopping</b>
					
				</div> 
	
				<?php
						Include('store_template_end.php');
				?>