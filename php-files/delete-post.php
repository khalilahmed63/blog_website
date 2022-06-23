
<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['post_id'])){
	
	$post_id = $_POST['post_id'];


	 
	$query = "DELETE FROM post WHERE `post_id` = '".$post_id."'";

	$result = mysqli_query($connection, $query);

	if($result){
		echo "Post Deleted Successfully";
		}
	else{
		echo "faild to Delete Post";
		}




		
	}




?>