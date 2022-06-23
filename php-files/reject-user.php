<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['user_id'])){
	
	$user_id = $_POST['user_id'];


	// UPDATE user SET `is_approved` = 'Approved' WHERE `user_id` = '".$user_id."'"; 
	$query = "UPDATE user SET `is_approved` = 'Rejected' WHERE `user_id` = '".$user_id."'";

	$result = mysqli_query($connection, $query)	;

	if($result)
	{
		echo "User Rejected";		
	}
	else{
		echo "Failed to Reject";		
			
	}




		
	}




?>