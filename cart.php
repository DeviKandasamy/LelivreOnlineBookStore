	<?php
		Include('store_template_start.php');
		Include('connect.php');
		
		$book_isbn = htmlspecialchars($_GET["isbn"]);
		$book_type = $_POST['book_type'];
		$add_quantity = $_POST['quantity'];
		if ($book_type == NULL OR $add_quantity == 0 OR $add_quantity > 100) {
			echo "<div class=\"maincol\">
				<div class=\"aside left\">
					<div class=\"page-title\">
						<h2> Order History </h2>
					</div>
					
						 <b>Please select both type and quantity to add to cart. <br> Can return to the previous page by clicking onto this <a href=\"bookinformation.php?isbn=$book_isbn\">link</a></b>
					
				</div> ";
			
		//	header("location:bookinformation.php?isbn=$book_isbn");
		}else{
		
		
		$user = $_SESSION['txtUsername'];
		$result_cartno = pg_exec($link, "select shoppingcartno, quantity from shoppingcart where userid='$user' and book_isbn='$book_isbn' AND book_type='$book_type'");
		$num_rows = pg_num_rows($result_cartno);
		
		if ($num_rows > 0 ) {
		    // existing cart
			$row = pg_fetch_array($result_cartno, 0);
			$cartno = $row['shoppingcartno'];
			$existing_quantity = $row['quantity'];
			$update_quantity = $existing_quantity + $add_quantity;
			if ($existing_quantity < 5 and $update_quantity > 5){
				$update_query = "update shoppingcart set quantity = $update_quantity, shippingcost=0 where shoppingcartno = '$cartno'";
			}
			else
			$update_query = "update shoppingcart set quantity = $update_quantity where shoppingcartno = '$cartno'";
			pg_exec($link, $update_query);
		} else {
		   //new cart
		   //Code to generate new cart number - largest cartno. + 1 
		   $result_largest_cart = pg_exec($link, "select shoppingcartno from shoppingcart ORDER BY shoppingcartno DESC limit 1");
		   $row = pg_fetch_array($result_largest_cart, 0);
		   $result_largest_cart_num = $row['shoppingcartno'];
  		   $newcartno = intval($result_largest_cart_num) + 1;
		   $select_type = pg_exec($link, "select * from $book_type where book_isbn = '$book_isbn'");
		   $row_type = pg_fetch_array($select_type, 0);
		   if ($book_type == 'ebook')
				$select_price = $row_type['ebook_price'];
			elseif ($book_type == 'hardcopy')
				$select_price = $row_type['hard_copy_price'];
			else
				$select_price = $row_type['soft_copy_price'];
		   if ($add_quantity > 5){
				$insert_cart_query = "insert into shoppingcart values ($newcartno, $add_quantity, $select_price, 0, '$book_type', '$user', '$book_isbn')";
				pg_exec($link, $insert_cart_query);
			}
			else
			{ 	
				$shipping_cost = ($select_price)/20;
				$insert_cart_query = "insert into shoppingcart values ($newcartno, $add_quantity, $select_price, $shipping_cost, '$book_type', '$user', '$book_isbn')";
				pg_exec($link, $insert_cart_query);
			}
		}
	
	
						
	echo		"<div class=\"maincol\">
				<div class=\"aside left\">
					<div class=\"page-title\">
						<h2> Shopping Cart </h2>
					</div>";
	
					$shoppingcart_items = pg_exec($link, "select * from book INNER JOIN shoppingcart ON shoppingcart.userid='$user' and shoppingcart.book_isbn=book.book_isbn;");
					$num_items = pg_numrows($shoppingcart_items);					
	
			
	echo "				<div class=\"box-wrapper content\">
						 <table border=\"1\" style=\"width:700px\">
							<tr>
	                		<th>BOOK NAME</th>
							<th>ISBN</th>
	                		<th>QUANTITY</th>
	                		<th>ITEM PRICE</th>
							<th>TYPE</th>
							<th>SHIPPING COST</th>
                            <th>TOTAL PRICE</th>
							</tr>";
			
							// Loop on rows in the genre set.
							$total =0;
							for($rowindex = 0; $rowindex < $num_items; $rowindex++) {
							$row_new = pg_fetch_array($shoppingcart_items, $rowindex);
							echo "<tr><th>",$row_new["title"], "</th><th>";
							echo $row_new["book_isbn"],"</th><th>";
							echo $row_new["quantity"],"</th><th>";
							echo $row_new["itemprice"],"</th><th>";
							echo $row_new["book_type"],"</th><th>";
							echo $row_new["shippingcost"],"</th><th>";
							echo $row_new["quantity"]*$row_new["shippingcost"]+$row_new["itemprice"],"</th></tr>";
							$total = $total + ($row_new["quantity"]*$row_new["shippingcost"]+$row_new["itemprice"]);
							}
							
						pg_close($link);
			
							
	                	echo "</table>	
						<a href=\"checkout.php? tot=$total\">
						<input style=\"float:right; margin: 50px 450px 0px 0px;\" type=\"submit\" name=\"Submit\" value=\"Proceed to Checkout\" tabindex=\"4\" ></a>
						<a href=\"emptycart.php? id=$user\">						
					 <input style=\"float:right; margin:-21px 300px 0px 0px;\" type=\"submit\" name=\"Submit\" value=\"Clear cart\" tabindex=\"6\"></a>
					 
					</div>
					
					

					<br><br><br><br>
				</div> ";
}

						Include('store_template_end.php');
				?>