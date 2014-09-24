<?php
 // Connecting, selecting database
	$link = pg_connect("host=localhost dbname=Lelivre user=postgres password=postgres")
     or die('Could not connect: ' . pg_last_error());
?>
