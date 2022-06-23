<?php
	require_once '../required/connection.php';		
	
    // activating comment
	if(isset($_POST['post_comment_id']) && $_POST['action'] == 'active_comment'){
	
	$post_comment_id = $_POST['post_comment_id'];

	$query = "UPDATE user_post_comment SET `is_active` = 'Active' WHERE `post_comment_id` = '".$post_comment_id."'";

	$result = mysqli_query($connection, $query)	;

	if($result)
	{
		echo "Comment Activated";		
	}
	else{
		echo "Failed to Activated";		
	}
	}

    // De-Activating comment
    if(isset($_POST['post_comment_id']) && $_POST['action'] == 'inactive_comment'){
	
        $post_comment_id = $_POST['post_comment_id'];
    
        $query = "UPDATE user_post_comment SET `is_active` = 'InActive' WHERE `post_comment_id` = '".$post_comment_id."'";
    
        $result = mysqli_query($connection, $query)	;
    
        if($result)
        {
            echo "Comment De-Activated";		
        }
        else{
            echo "Failed to De-Activated";		
        }
        }



        // Deleting comment
    if(isset($_POST['post_comment_id']) && $_POST['action'] == 'delete_comment'){
	
        $post_comment_id = $_POST['post_comment_id'];
    
        $query = "DELETE FROM user_post_comment WHERE `post_comment_id` = '".$post_comment_id."'";
    
        $result = mysqli_query($connection, $query)	;
    
        if($result)
        {
            echo "Comment Deleted Successfully";		
        }
        else{
            echo "Comment Not Deleted";		
        }
        }


?>