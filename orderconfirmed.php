	<?php
		Include('store_template_start.php');
		Include('connect.php');
		$user = $_SESSION['txtUsername'];	
		$amount = $_POST['tot_amt'];
		$creditcard = $_POST['creditcard'];
		//$card_use = $_POST['card'];
		// 1. Add a single entry to transaction table
		// 2. Add entries into transaction_booklog table
		// 3. Delete relevant entries from shoppingcart table
		$get_transaction_query = "select transactionid from transaction order by transactionid desc limit 1";
		$result_max_transac_id = pg_exec($link, $get_transaction_query);
		$row = pg_fetch_array($result_max_transac_id, 0);
		$max_transac_id = $row['transactionid'];
		$new_transac_id = $max_transac_id + 1;
		$current_date = date("Y-m-d");
		echo $current_date;
		// 1. Add a single entry to transaction table
		$insert_transaction_query = "insert into transaction values($new_transac_id, '$user', to_date('$current_date','yyyy/mm/dd'), $amount, '$creditcard')";
		pg_exec($link, $insert_transaction_query);
		
		//  Combining 2 and 3
		$cart_fetch_query = "select * from shoppingcart where userid = '$user'";
		$cart_fetch_result = pg_exec($link, $cart_fetch_query);
		$num_cart_items = pg_numrows($cart_fetch_result);
		
		for($rowindex = 0; $rowindex < $num_cart_items; $rowindex++) {
			$cart_item = pg_fetch_array($cart_fetch_result, $rowindex);
			$booktype = $cart_item['book_type'];
			$quantity = $cart_item['quantity'];
			$book_isbn = $cart_item['book_isbn'];
			$shoppingcartno = $cart_item['shoppingcartno'];
			$insert_transac_booklog_query = "insert into transaction_booklog values ($new_transac_id, '$book_isbn', '$booktype', $quantity)";
			#echo $insert_transac_booklog_query;
			pg_exec($link, $insert_transac_booklog_query);
			$delete_cart_query = " delete from shoppingcart where shoppingcartno = $shoppingcartno";
			#echo $delete_cart_query;
			pg_exec($link, $delete_cart_query);
		}
		

			/*
			foreach ($_POST as $key => $value) {
			echo "<tr>";
			echo "<td>";
			echo $key;
			echo "</td>";
			echo "<td>";
			echo $value;
			echo "</td>";
			echo "</tr>";
			*/
			
		
		pg_close($link);
	?>
						
			<div class="maincol">
				<div class="aside left">
					<div class="page-title">
						<h2> Order History </h2>
					</div>
					
						 <b>Your order is placed!!! Enjoy your shopping with Lilivre Book Store!!!</b>
					
				</div> 
	
				<?php
						Include('store_template_end.php');
				?>
				