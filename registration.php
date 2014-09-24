<?php
Include('store_template_start.php');
Include('connect.php');

//if submit is not blanked i.e. it is clicked.
if(isset($_REQUEST['submit'])!='')
{
  if($_REQUEST['email']=='' ||
     $_REQUEST['lname']=='' ||
     $_REQUEST['password']=='') {
    $summary = "<h2 style=\"color:#ff0000\"> Registration Failed </h2>";
    $message = "Please fill the required fields.";
  }
  else
  {
    // First check if password and repassword match.
    if ($_REQUEST['password'] != $_REQUEST['repassword']) {
      $summary = "<h2 style=\"color:#ff0000\"> Registration Failed </h2>";
      $message = "Passwords entered don't match. Please re-enter details.";
    } else {
      // Next check if the email is already registered.
      $query = "select * from customer where userid = '".$_REQUEST['email']."' ";
      $result = pg_query($link, $query);
      $rows = pg_num_rows($result);
      if ($rows > 0) {
        $summary = "<h2 style=\"color:#ff0000\"> Registration Failed <h2>";
        $message = "<b> Specified email already exists. Please login <a href=\"index.php\">here</a>. </b>";
      } else {
        $query="insert into CUSTOMER
          values('".$_REQUEST['email']."',
                 '".$_REQUEST['fname']."',
                 '".$_REQUEST['mname']."',
                 '".$_REQUEST['lname']."',
                 '".$_REQUEST['bdate']."',
                 NULL,
                 '".$_REQUEST['address']."',
                 '".$_REQUEST['password']."',
                 NULL)";
        $result = pg_query($link, $query);
        if($result) {
          $summary = "<h2> Registration Complete </h2>";
          $message = "<b> Congratulations! you are now registered and your account has been activated. Please login <a href=\"index.php\">here</a>.</b>";
        }
        else
        {
          $summary = "<h2 style=\"color:#ff0000\"> Registration Failed </h2>";
          $message = "<b> There is some problem in inserting record </b>";
        }
      }
    }
  }
}
?>

<div class="maincol">
<div class="box-wrapper">
<div class="page-title">
<h2> Status </h2>
</div>
<div class="box-simple">

<?php
echo $summary;
echo $message;
?>

</div> <!-- end box-wrapper -->
</div> <!-- end main content -->
<?php
	Include('store_template_end.php');
?>

