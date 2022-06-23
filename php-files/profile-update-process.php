<?php

require_once '../required/connection.php';
session_start();
if (isset($_REQUEST['profile_update'] )) {
	// echo "this is profile update page";

	$user_id = $_SESSION['user']['user_id'];
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$email = $_REQUEST['email'];
	$gender = $_REQUEST['gender'];
	$dob = $_REQUEST['dob'];
	$address = $_REQUEST['address'];




	if ($first_name === '') {
		header('location:../profile.php?msg=first Name is empty');
	}

	if ($email === '') {
		header('location:../profile.php?msg=email is Empty');
	}

	

	if ($dob === '') {
		header('location:../profile.php?msg=Date of Birth is Empty');
	}

	if ($gender === '') {
		header('location:../profile.php?msg=gender is Empty');
	}
	

	if ($address === '') {
		header('location:../profile.php?msg=Address is Empty');
	}
	


	$filename = $_FILES["image"]["name"];
	$tempname = $_FILES['image']['tmp_name'];	

	if ($filename == '') {
		$filename = $_REQUEST["image2"];
	}





	$time_stamp = date("Y-m-d h:i:s");
	if ($first_name !== '' &&  $email !== ''  && $dob !== '' && $gender !== '' && $address !== '') {
		

		
		$query = "UPDATE user SET `first_name` = '$first_name' , `last_name` = '$last_name' , `email` = '$email' , `gender` = '$gender' , `date_of_birth` = '$dob' , `user_image` = '$filename' , `address` = '$address' , `updated_at` = '$time_stamp' WHERE `user_id` = '$user_id';";

		$result = mysqli_query($connection, $query)	;



			$dir = "../images/profile-images";
			if (!is_dir($dir)) 
			{
				mkdir($dir);
				echo "Directory Created";
			}   	
		    else
		    {
		    	// echo "Not Created";
		    }


		    $dir = "../images/profile-images";

		    if (move_uploaded_file($tempname,$dir.'/'.$filename)){
		    		 echo "profile Uploaded...!";
		    }
		    else{
		    		 echo "Not Working";
		    	}

		
		if($result){

			
			header('location:../profile.php?msg=Profile Updated Successfully');
		}
		
		

	}
	else{

		header('location:../profile.php?msg=Empty Fields');
	}	




}
else{
	header('location:../index.php');
}


?>