<?php



session_start();
require_once '../required/connection.php';
date_default_timezone_set("Asia/Karachi");
if (isset($_REQUEST['send_feedback'])) {
  		

  		if(isset($_SESSION['user'])){
  			// print_r($_SESSION['user']);

  			$user_id = $_SESSION['user']['user_id'] ;
  			$name = $_SESSION['user']['first_name'];
  			$email = $_SESSION['user']['email'];
  		}
  		else{
  			$name = $_REQUEST['name'];
  			$email = $_REQUEST['email'];
  		}
  			
  		

		
			$feedback = $_REQUEST['feedback'];



			$time_stamp = date("Y-m-d h:i:s");
		if ($user_id !== '' && $name !== '' &&  $email !== '' && $feedback ) {

			if(isset($_SESSION['user'])){
				$query = "INSERT INTO user_feedback (`user_id`, `user_name`, `user_email`, `feedback`, `updated_at`) VALUES ('$user_id', '$name', '$email', '$feedback', '$time_stamp')";

				$result = mysqli_query($connection, $query);
			}
			else {
				$query = "INSERT INTO user_feedback ( `user_name`, `user_email`, `feedback`, `updated_at`) VALUES ( '$name', '$email', '$feedback', '$time_stamp')";

				$result = mysqli_query($connection, $query);
			}
			 
			

			if($result){
				header('location:../send-feedback.php?msg=Feedback Sent Successfully');
			}
			else{
				header('location:../send-feedback.php?msg=Feedback Not Sent');	
			}

		}

  }


        // Deleting Feedback
		elseif(isset($_POST['feedback_id']) && $_POST['action'] == 'delete_feedback'){
	
			$feedback_id = $_POST['feedback_id'];

			
			$query = "DELETE FROM user_feedback WHERE `feedback_id` = '".$feedback_id."'";
		
			$result = mysqli_query($connection, $query)	;
		
			if($result)
			{
				echo "Feedback Deleted Successfully";		
			}
			else{
				echo "Feedback Not Deleted";		
			}
			}
	
	
  else{
  	 header("location:index.php"); 
  }




?>