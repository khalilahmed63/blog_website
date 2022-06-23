<?php


session_start();
require_once '../required/connection.php';
date_default_timezone_set("Asia/Karachi");
if (isset($_REQUEST['send_comment'])) {
  		
		$comment = $_POST['comment'];
		$post_id = $_POST['post_id'];


		// print_r($_SESSION['user']);

  		if(isset($_SESSION['user'])){

  			// print_r($_SESSION['user']);
  			$user_id = $_SESSION['user']['user_id'] ;
  			$name = $_SESSION['user']['first_name'];
  			$email = $_SESSION['user']['email'];
  		         
  		}
  		else{
  			header("location:index.php");
  		}


		if ($comment == '') {
			header('location:../post-detail.php?post_id='.$post_id.'&msg=Enter Comment First');
		}

			$time_stamp = date("Y-m-d h:i:s");
		if ($post_id !== '' && $user_id !== '' && $comment !== '' ) {
			 
			$query = "INSERT INTO user_post_comment (`post_id`, `user_id`, `comment`, `is_active`,  `created_at`) VALUES ('$post_id', '$user_id', '$comment', 'InActive', '$time_stamp');";

			$result = mysqli_query($connection, $query);

			if($result){
				header('location:../post-detail.php?post_id='.$post_id.'&msg=Comment Added Successfully wait for Approval ');
			}
			else{
				header('location:../post-detail.php?faild_msg=Comment Not Sent');	
			}

		}

  }
  // else{
  // 	 header("location:index.php"); 
  // }




?>
