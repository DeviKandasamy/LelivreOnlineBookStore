				
				<?php
					Include('store_template_start.php');
					Include('connect.php');
					$book_select = htmlspecialchars($_GET["isbn"]);
					$book = pg_exec($link,  "SELECT book.book_isbn,title, year_of_publication, book_edition, pname, rating.review_comments, avg(numbers) FROM  book LEFT JOIN rating ON book.book_isbn = '$book_select' group by book.book_isbn, rating.review_comments");
					$book_reviews = pg_exec($link, "SELECT review_comments, userid, numbers FROM  rating where book_isbn = '$book_select'" );
					$numreviews = pg_numrows($book_reviews);
					$book_price = pg_exec($link, "select ebook_price,hard_copy_price,soft_copy_price from hardcopy, ebook,softcopy where hardcopy.book_isbn=ebook.book_isbn and softcopy.book_isbn=ebook.book_isbn and ebook.book_isbn='$book_select'" );
					$author = pg_exec($link, "select firstname, middlename, lastname from writes where book_isbn = '$book_select'");
					$numauthor = pg_numrows($author);
				?>
				
				
					<div class="maincol">
					
						<div class="page-title">
							<h2> Book Information </h2>
						</div>
						<div class="aside left">
							<div class="box-wrapper">
							<?php
								// Loop on rows in the genre set.								
								echo "<ul class=\"list-1\">";
								$row = pg_fetch_array($book);
								echo "<li>", $row["book_isbn"], "</li>";
								echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
								echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
								echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
								echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
									if ($row["avg"] == 0 ) {
										echo "<li>", "<b> Book Rating: </b> Not Yet Rated", "</li>";
									}else{
										echo "<li>", "<b> Book Rating: </b>", round($row["avg"], 2), "</li>";
									}
								$row_price = pg_fetch_array($book_price);
								
							  //echo "<FORM  method = \"post\" >";
								if (isset($_SESSION["loggedin"]) == true) {
								if ($_SESSION["loggedin"] == true) {
								echo "<FORM name=f1 action=\"cart.php?isbn=", $row["book_isbn"],"\" method = \"post\" onsubmit=\"return validateForm()\">";}}
								else{ echo "<FORM  action=\"index.php\" method = \"post\" >";
								}
								echo "<li>", "<b> Select the type: </b>", "<select id=\"dropdown\" name=\"book_type\"><option value=\"softcopy\">Softcopy</option><option value=\"hardcopy\">HardCopy</option><option value=\"ebook\">ebook</option></select>";

								$book_isbn = $row['book_isbn'];
								$ebook_type = pg_exec($link, "select * from ebook where book_isbn = '$book_isbn'");
								$row_ebook = pg_fetch_array($ebook_type, 0);
								$softcopy_type = pg_exec($link, "select * from softcopy where book_isbn = '$book_isbn'");
								$row_softcopy = pg_fetch_array($softcopy_type, 0);
								$hardcopy_type = pg_exec($link, "select * from hardcopy where book_isbn = '$book_isbn'");
								$row_hardcopy = pg_fetch_array($hardcopy_type, 0);								
							echo "<li><b> Price:    </b></li>";
							echo "<textarea id=\"mytext\" style=\"width: 75px; height: 16px\" disabled></textarea></p>
								<script type=\"text/javascript\">
								var mytextbox = document.getElementById('mytext');
								var mydropdown = document.getElementById('dropdown');
								mydropdown.onchange = function(){
								if (this.value == \"ebook\"){
									mytextbox1 = \"$row_ebook[0]\";
									mytextbox.value = \"$\" + mytextbox1;
									document.cookie =  this.value;
									}else if (this.value == \"softcopy\"){
								   mytextbox1 = \"$row_softcopy[0]\";
								  mytextbox.value = \"$\" + mytextbox1;
								  document.cookie =  this.value;
								  }else{
								   mytextbox1 = \"$row_hardcopy[0]\";
								  mytextbox.value = \"$\" + mytextbox1;
								  document.cookie =  this.value;
								  }		  
							}
						</script>";								
								echo "<li>", "<b> Quantity:    </b>", "<input type=\"number\" name=\"quantity\" min=\"1\" max=\"100\">";
								
								echo "<br><br><br><br><br>";
								echo "</ul>";
								echo "<span><img style=\"float:right; margin:-350px 0px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"250\" height=\"250\"/></span>";
								echo "<input style=\"float:right; margin:-22px 500px 0px 0px;\" type=\"submit\" name=\"Submit\" value=\"Add to cart\" tabindex=\"4\" />"; 

                $book_isbn = $row["book_isbn"];
                echo "<input style=\"float:right; margin:-21px 350px 0px 0px;\" tabindex=\"6\" type='submit' value='Add Review' onclick=\"f1.action='add_review.php?isbn=$book_isbn' ; return true;\">";

					
								
								
								echo "<br><br>";
								echo "</FORM>";
								echo "</div>";
								echo "<br><br>";
								echo "<ul class=\"list-1\">";
								echo "<li>", "<b> Review Comments: </b>";
								for($rowindex = 0, $count=1; $rowindex < $numreviews; $rowindex++) {
									$row = pg_fetch_array($book_reviews, $rowindex);
										if ($row["review_comments"] != NULL){
											echo "<br>";
											echo "$count" , ".";	
											echo  $row["review_comments"];
											echo "<br>";
											echo "Rating: ";
											echo $row["numbers"];
											echo "<br>";
											echo "User: ";
											echo $row["userid"];
											$count++;
										}
								}
								echo "<br><br>";
								//echo "<li>", "<b> From inside the book: </b><br>";
								//echo "When Christine Blacksworth's larger-than-life father is killed on an icy road in Magdalena, New York, a hundred miles from the 'getaway' cabin he visited every month, she discovers a secret that threatens everything she's always held to be true. Her father has another family which includes a mistress and a daughter. Determined to uncover the truth behind her father's secret life, Christine heads to Magdalena, prepared to hate the people who have caused her to question everything she thought she knew about her father. But what she finds is a woman who understands her, a half sister who cherishes her, and a man who could love her if she'll let him. The longer she's around them, the more she questions which family is the real one ...";
								echo "<li>", "<b> Author: </b><br>";
								for($rowindex = 0; $rowindex < $numauthor; $rowindex++) {
									$row_author = pg_fetch_array($author, $rowindex);
								echo $row_author["firstname"]," ", $row_author["middlename"]," ", $row_author["lastname"], "<br></li>";
								}	
								echo "<br><br><br><br>";
								echo  "</li>";
								echo "</ul>";
							pg_close($link);
							?>
						</div> <!-- end box-wrapper -->
					</div> <!-- end main content -->
			
					<?php
						Include('store_template_end.php');
					?>
					
					
