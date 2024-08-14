<?php require_once('./../bd/conbd.php'); ?>
<?php
if(isset($_GET['id'])) {
	$id=$_GET['id'];
    $sql = $pdo->prepare("DELETE FROM user WHERE id=?");
    $sql->execute(array($id));
    header("location: adduser.php");
    }else{
	header("location: logout.php");
	}
?>