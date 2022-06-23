<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['user_id'])){
	
	$user_id = $_POST['user_id'];

	$query = "UPDATE user SET `is_approved` = 'Approved' WHERE `user_id` = '".$user_id."'";

	$result = mysqli_query($connection, $query)	;

	if($result)
	{
		echo "User Approved";		
	}
	else{
		echo "Failed to Approve";		
			
	}

		
	}




?>