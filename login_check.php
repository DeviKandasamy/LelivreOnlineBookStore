<?php
Include('store_template_start.php');
?>

<?php
Include('connect.php');
if(isset($_REQUEST['Submit'])!='') {
  if($_REQUEST['txtUsername']== '' || $_REQUEST['txtPassword']== '') {
    $summary = "Login failed.";
    $message = "Please fill up the empty fields.";
	// echo "$summary";
	// echo "$message";
  } else {
    $query="select *
      from customer
      where userpassword = '".$_REQUEST['txtPassword']."' AND
      userid  = '".$_REQUEST['txtUsername']."'";
    $result = pg_query($link, $query);
    $rows = pg_num_rows($result);
    if ($rows == 1) {
      $summary = "Successfully logged in.";
      $message = "Successfully logged in.";

      // Register $name, $password and redirect to file "login_success.php"
      session_start();
      $_SESSION['txtUsername'] = $_REQUEST['txtUsername'];
      $_SESSION['txtPassword'] = $_REQUEST['txtPassword'];
      $_SESSION['loggedin'] = "true";
      // header("Refresh:0");
      header("location:control_panel.php");
    } else {
      $_SESSION['loggedin'] = "false";
      $summary = "Login failed.";
      $message = "<h2 style=\"color:#ff0000\">Wrong email id and password combination.";
      // echo $summary;
      // echo $message;
    }
  }
}
?>

<div class="maincol">
<div class="box-wrapper">
<div class="page-title">
<h2> Status </h2>

<?php
echo $summary, " ", $message;
?>

</div> <!-- end box-wrapper -->
</div> <!-- end main content -->
<?php
Include('store_template_end.php');
?>
