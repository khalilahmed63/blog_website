<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['email']) && isset($_POST['password'])){
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM user WHERE email = '".$email."' and password = '".$password."'";
	$result = mysqli_query($connection, $query)	;

	if($result->num_rows){
			return('varified User');
			
			}
	else{
			return('invalid Email/Password');
	}




		
	}




?>