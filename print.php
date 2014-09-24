<?php

function printBookArray($row, $author)
{
  $numauthor = pg_numrows($author);
  echo "<div class=\"aside right\">";
  echo "<div class=\"box-wrapper\">";
  echo "<ul class=\"list-1\">";
  echo "<li>", $row["book_isbn"], "</li>";
  echo "<li>", "<b>Title: </b>", $row["title"], "</li>";
  echo "<li>", "<b>Author: </b>";
  for($rowindex1 = 0; $rowindex1 < $numauthor; $rowindex1++) {
    $row_author = pg_fetch_array($author, $rowindex1);
    if ($row["book_isbn"] == $row_author["book_isbn"])
      echo $row_author["firstname"], $row_author["middlename"], $row_author["lastname"], "<br></li>";
  }
  echo "</li>";
  echo "<li>", "<b> Year of publication: </b>", $row["year_of_publication"], "</li>";
  echo "<li>", "<b> Book Edition: </b>", $row["book_edition"], "</li>";
  echo "<li>", "<b> Publisher Name: </b>", $row["pname"], "</li>";
  /*if ($row["avg"] == 0 ) {
    echo "<li>", "<b> Book Rating: </b> Not Yet Rated", "</li>";
  }else{
    echo "<li>", "<b> Book Rating: </b>", round($row["avg"], 2), "</li>";
  }*/

  echo "<br><br><br><br><br><br>";
  echo "</ul>";

  echo "<span><a href=\"bookinformation.php?isbn=", $row["book_isbn"], "\"><img style=\"float:right; margin:-225px 100px 0px 10px; border:0\" src=\"", "images/", $row["title"], ".jpg\" width=\"200\" height=\"200\"/></a></span>";
  echo "</div>";
}
?>
