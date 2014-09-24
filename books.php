				<?php
					Include('store_template_start.php');
					Include('connect.php');
					$action_allbooks = pg_exec($link, "SELECT book.book_isbn,title, year_of_publication, book_edition, pname, avg(numbers) FROM  book LEFT JOIN rating ON book.book_isbn = rating.book_isbn group by (book.book_isbn)");
					
					$numallbooks = pg_numrows($action_allbooks);
					//Display rating
					
					//echo $numallbooks;
					$author = pg_exec($link, "select * from writes ");
					$numauthor = pg_numrows($author);
				?>	
			<div class="maincol">
					<div class="page-title">
						<h2> Books in All Category </h2>
					</div>
					
						<?php
						// Loop on rows in the genre set.
							for($rowindex = 0; $rowindex < $numallbooks; $rowindex++) {
								echo "<div class=\"aside right\">";
								echo "<div class=\"box-wrapper\">";
								echo "<ul class=\"list-1\">";
								//echo $numallbooks;
								
								$row = pg_fetch_array($action_allbooks, $rowindex);
								echo "<li>", $row["book_isbn"], "</li>";
								echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
								echo "<li>", "<b>Author: </b>";
								//echo $rowindex;
								for($rowindex1 = 0; $rowindex1 < $numauthor; $rowindex1++) {
									$row_author = pg_fetch_array($author, $rowindex1);
										if ($row["book_isbn"] == $row_author["book_isbn"])
											echo $row_author["firstname"]," ", $row_author["middlename"]," ", $row_author["lastname"], "<br></li>";
								}	
								//echo $rowindex;
								echo "</li>";
								echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
								echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
								echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
									if ($row["avg"] == 0 ) {
										echo "<li>", "<b> Book Rating: </b> Not Yet Rated", "</li>";
									}else{
										echo "<li>", "<b> Book Rating: </b>", round($row["avg"], 2), "</li>";
									}
								
								echo "<br><br><br><br><br>";
								echo "</ul>";
								
								echo "<span><a href=\"bookinformation.php?isbn=", $row["book_isbn"], "\"><img style=\"float:right; margin:-225px 100px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"200\" height=\"200\"/></a></span>";
								echo "</div>";
								
							}
						pg_close($link);
						?>
					</div> <!-- end box-wrapper -->
				</div> <!-- end main content -->
				<?php
					Include('store_template_end.php');
				?>