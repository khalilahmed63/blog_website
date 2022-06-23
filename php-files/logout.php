<?php 
	session_start();
	require_once("../required/connection.php");
	
		session_destroy();
		header("location:../login.php?msg=Logout Successfully");
	


?>