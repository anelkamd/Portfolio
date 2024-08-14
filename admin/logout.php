<?php require_once('./../bd/conbd.php'); ?>
<?php 
unset($_SESSION['user']);
header("location: ./../login.php");
?>