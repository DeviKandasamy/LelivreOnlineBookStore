<!DOCTYPE html>
<html>
	<head>
		<title> Lelivre Book Store</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<font size="8" style="float:center; margin:0px 0px 0px 480px; border:2">LeLivre Book Store</font></p>
	<?php
		Include('connect.php');
		$genres = pg_exec($link, "select distinct genre_name from genre order by genre_name;");
		$numgenres = pg_numrows($genres);
		session_start();
		if (isset($_SESSION['loggedin']) == true && $_SESSION['loggedin'] == "true") {
			echo "<font size=\"4\" style=\"float:center; margin:0px 0px 5px 900px; border:0\">";
			echo "Welcome ", $_SESSION['txtUsername'] ;
		  echo "<a href=\"logout.php\"> Logout  </a></li></font>";
    }
	?>
		<div class="rows">
			<div id="main-menu">
				<ul>
					<li><a href="control_panel.php"><span>Home</span></a></li>
					<li><a href="books.php"><span>All Books</span></a></li>
					<li><a href="contact.php"><span>Contact Us</span></a></li>
					<li><a href="policy.php"><span>Policy</span></a></li>
					<li></li>
				</ul>
			</div>
	<!--<IMG STYLE="position:absolute; TOP:35px; LEFT:170px; WIDTH:50px; HEIGHT:50px" SRC="circle.gif"><IMG STYLE="TOP:75px; WIDTH:1000px; HEIGHT:150px" SRC="library_book.jpg"/>-->
		</div>
		
		<span>
			<img style="float:center; margin:0px 0px 5px 175px; border:0" src="images/library_book.jpg" width="1000" height="150"/>
		</span>
	
		<div class="headSearch"> 
			<form name="topSearch" method="post" action="search.php">
				<div class="box">
					<span><input  type="submit" value="" name="srch" /></span>
					<span><input type="text" size="30" class="" name="text" placeholder="Search..."/></span>
					<span>SEARCH</span>
				</div>
			</form>
		</div>
		
		<div id="content">
			<div class="layout clearfix">
				<div class="aside left">
					<div class="box-wrapper content">
						<div class="menu-title">
							<h2>All Categories</h2>
						</div> 
						<ul class="list-1">
						<?php
							// Loop on rows in the genre set.
							for($rowindex = 0; $rowindex < $numgenres; $rowindex++) {
							$row = pg_fetch_array($genres, $rowindex);
							echo "<li><a href=\"genre.php?genre=", $row["genre_name"], "\">";
							//echo "<li><a href=books-in-", $row["genre_name"], ".php " ,"title=Book-in-", $row["genre_name"], ">";
							echo $row["genre_name"];
							echo "</a></li>";
							}
						pg_close($link);
						?>
						</ul>
					</div> <!-- end categories box-wrapper -->
				</div> <!-- end aside-left -->  <!-- include left-menu -->
			
				
