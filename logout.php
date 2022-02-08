<?php require_once('Admin/php/connection.php'); ?>
<?php require_once('Admin/php/session.php'); ?>
<?php require_once('Admin/php/functions.php'); ?>
<?php
  unset($_SESSION['uid']);
  header("Location: index.html");

?>