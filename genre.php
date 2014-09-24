
	<?php
		Include('store_template_start.php');
		Include('connect.php');
		$genres_name = trim($_GET["genre"]);
		$genres = pg_exec($link, "select * from book, genre where book.book_isbn = genre.book_isbn and genre_name='$genres_name';");
		$numgenres = pg_numrows($genres);
		$book_rating = pg_exec($link, "SELECT book.book_isbn, avg(numbers) FROM  book LEFT JOIN rating ON book.book_isbn = rating.book_isbn group by (book.book_isbn)");
		$author = pg_exec($link, "select * from writes");
		$numauthor = pg_numrows($author);
	?>

				<div class="maincol">
					<div class="box-wrapper">
						<div class="box-simple">
							<?php
								echo "<div class=\"page-title\">";
								echo "<h2> Books in ", $genres_name, " Category </h2>";
								echo "</div>";
								// Loop on rows in the genre set.
								for($rowindex = 0; $rowindex < $numgenres; $rowindex++) {
								echo "<div class=\"aside right\">";
								echo "<div class=\"box-wrapper\">";
								echo "<ul class=\"list-1\">";
								$row = pg_fetch_array($genres , $rowindex);
								echo "<br>";
								echo "<li>", $row["book_isbn"], "</li>";
								echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
								echo "<li>", "<b>Author: </b>";
								for($rowindex1 = 0; $rowindex1 < $numauthor; $rowindex1++) {
									$row_author = pg_fetch_array($author, $rowindex1);
										if ($row["book_isbn"] == $row_author["book_isbn"])
											echo $row_author["firstname"]," ", $row_author["middlename"]," ", $row_author["lastname"], "<br></li>";
								}	
								echo "</li>";
								echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
								echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
								echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
								$row_rating = pg_fetch_array($book_rating);
								//if ($row["book_isbn"] == $row_rating["book_isbn"] and $row_rating["avg"] == 0 ) {
									//echo "<li>", "<b> Book Rating1: </b> Not Yet Rated", "</li>";
							//	}
								if ($row["book_isbn"] == $row_rating["book_isbn"] and $row_rating["avg"] > 0){
									echo "<li>", "<b> Book Rating: </b>", round($row_rating["avg"], 2), "</li>";
								}
								echo "<br><br><br><br><br>";
								echo "</ul>";
								echo "<span><a href=\"bookinformation.php?isbn=", $row["book_isbn"], "\"><img style=\"float:right; margin:-220px 100px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"200\" height=\"200\"/></a></span>";
								echo "</div>";
								}
							pg_close($link);
							?>
						</div> <!-- end box-wrapper -->
					</div> <!-- end main content -->
					
		<?php
			Include('store_template_end.php');
		?>
					
		
