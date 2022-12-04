<?php 
	include('libs/database.php');
	$sql='DELETE FROM cart';
	db_execute($sql);
	session_start();
	session_destroy();
	header('location:signin.php');
 ?>