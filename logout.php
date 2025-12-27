<?php
include('header.php');  // Include Header
session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit;
?>
<?php include('footer.php');  // Include Footer ?>