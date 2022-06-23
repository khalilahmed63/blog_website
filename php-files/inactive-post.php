


<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['post_id'])){
	
	$post_id = $_POST['post_id'];


	 
	$query = "UPDATE post SET `post_status` = 'InActive' WHERE `post_id` = '".$post_id."'";

	$result = mysqli_query($connection, $query);

	if($result){
		echo "Post InActivated Successfully";
		}
	else{
		echo "faild to Inactivate";
		}

	}




?>