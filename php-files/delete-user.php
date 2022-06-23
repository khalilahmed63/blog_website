


<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['user_id'])){
	
	$user_id = $_POST['user_id'];


	 
	$query = "DELETE FROM user WHERE `user_id` = '".$user_id."'";

	$result = mysqli_query($connection, $query);

	if($result){
		echo "User Deleted Successfully";
		}
	else{
		echo "faild to Delete";
		}




		
	}




?>