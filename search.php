				<?php
					Include('store_template_start.php');
					Include('connect.php');
					$search = trim($_POST['text']);
					$search_int = intval($search);
					$book_search_query = "select * from book, writes where book.book_isbn = writes.book_isbn and ( title ILIKE '%$search%' OR pname ILIKE '%$search%' OR book.book_isbn ILIKE '%$search%' OR year_of_publication = $search_int OR book_edition =$search_int)";
					
					$author_search_query = "select * from book, writes where book.book_isbn=writes.book_isbn and ( writes.firstname ILIKE '%$search%' or writes.lastname ILIKE '%$search%' or writes.middlename ILIKE '%$search%')";
					$book_author_search = pg_exec($link, $book_search_query." UNION ".$author_search_query );
					$book_author_numsearch = pg_numrows($book_author_search);
					
					//echo " Book author num search : $book_author_numsearch";
					
					
					$review_search_author_query = "select book.book_isbn, book.title, book.book_edition, book.year_of_publication, book.pname,  rating.review_comments from book, writes, rating where book.book_isbn = writes.book_isbn and writes.firstname = rating.firstname  and writes.lastname = rating.lastname and rating.review_comments ILIKE '%$search%'";
					
					$review_search_book_query = "select book.book_isbn, book.title, book.book_edition, book.year_of_publication, book.pname,  rating.review_comments from book , writes, rating where book.book_isbn = writes.book_isbn and  book.book_isbn = rating.book_isbn  and  rating.review_comments ILIKE '%$search%'";
					//echo $review_search_book_query ;
					//echo $review_search_author_query;
					$review_search = pg_exec ($link, $review_search_book_query. " UNION " . $review_search_author_query);
					
					$review_search_count = pg_numrows($review_search);
                   // echo  " Review search count : $review_search_count";
				?>


				<div class="maincol">
					<div class="box-wrapper">
						<div class="page-title">
							<h2> Books in All Category </h2>
						</div>
						<div class="box-simple">
							<?php
								// Loop on rows in the genre set.
								// Search in book and author tables
								$booklist_arr = array();
								
								for($rowindex = 0; $rowindex < $book_author_numsearch; $rowindex++) {
									$row = pg_fetch_array($book_author_search, $rowindex);
									$book_isbn = $row["book_isbn"];
									if (array_key_exists($row["book_isbn"],$booklist_arr)) {
											continue;
									}
									$booklist_arr[$book_isbn] = 1;
									
								echo "<ul class=\"list-1\">";
								
								echo "<li>", $row["book_isbn"], "</li>";
								echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
								echo "<li>", "<b>Author: </b>";
								
									$author_list_query = "select * from writes where book_isbn = '$book_isbn'"; 
									$author_list = pg_exec($link, $author_list_query);
									$author_count = pg_numrows($author_list);
								for($rowindex1 = 0; $rowindex1 < $author_count; $rowindex1++) {
									$row_author = pg_fetch_array($author_list, $rowindex1);
										echo $row_author["firstname"]," ", $row_author["middlename"]," ", $row_author["lastname"], "<br></li>";
								}
								echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
								echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
								echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
								
								echo "<br><br><br><br><br>";
								echo "</ul>";
								echo "<span><a href=\"bookinformation.php?isbn=", $row["book_isbn"], "\"><img style=\"float:right; margin:-225px 100px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"200\" height=\"200\"/></a></span>";
								}
								// Search in ratings table - author reviews and book reviews
								for($rowindex = 0; $rowindex < $review_search_count; $rowindex++) {
									$row = pg_fetch_array($review_search, $rowindex);
									if (array_key_exists($row["book_isbn"],$booklist_arr)) {
											echo "skipping repeater";
											echo $row["book_isbn"];
											continue;
									}
								$book_isbn = $row["book_isbn"];
								//echo $book_isbn;
								$booklist_arr[$book_isbn] = 1;
								echo "<ul class=\"list-1\">";
								
								echo "<li>", $row["book_isbn"], "</li>";
								echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
								
								$author_list_query = "select firstname , middlename, lastname from writes where book_isbn = '$book_isbn'"; 
								//echo $author_list_query;
									$author_list = pg_exec($link, $author_list_query);
									$author_count = pg_numrows($author_list);
									//echo "author count : $author_count";
								echo "<li>", "<b>Author: </b>";
								for($rowindex1 = 0; $rowindex1 < $author_count; $rowindex1++) {
									$row_author = pg_fetch_array($author_list, $rowindex1);
										echo $row_author["firstname"]," ", $row_author["middlename"]," ", $row_author["lastname"], "<br></li>";
								}
								echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
								echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
								echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
								echo "<li>", "<b> Review: </b>", $row["review_comments"], "<br></li>";
								echo "<br><br><br>";
								echo "</ul>";
								echo "<span><a href=\"bookinformation.php?isbn=", $row["book_isbn"], "\"><img style=\"float:right; margin:-225px 100px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"150\" height=\"120\"/></a></span>";
								}
							  pg_close($link);
							?>
						</div> <!-- end box-wrapper -->
					</div> <!-- end main content -->

				<?php
						Include('store_template_end.php');
				?>
