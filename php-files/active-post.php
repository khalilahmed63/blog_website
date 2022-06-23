
<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['post_id'])){
	
	$post_id = $_POST['post_id'];


	// UPDATE post SET `post_status` = 'Active' WHERE `post_id` = '".$post_id."'; 

	// $query = "UPDATE post SET `is_active` = 'Active' WHERE `user_id` = '".$post_id."'";
	$query = "UPDATE post SET `post_status` = 'Active' WHERE `post_id` = '".$post_id."'";

	$result = mysqli_query($connection, $query);

	if($result){
		echo "Post Activated Successfully";
		}
	else{
		echo "faild to Activate Post";
		}




		
	}




?>