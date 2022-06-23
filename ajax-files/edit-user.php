<?php


include_once('../required/connection.php');



if(isset($_REQUEST['save_changes'])){

    $user_id = $_REQUEST['user_id'];


    $role_id = $_REQUEST['role_id'];
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];
    $date_of_birth = $_REQUEST['date_of_birth'];
    $date_of_birth = $_REQUEST['date_of_birth'];
    $imagename = $_FILES["image"]["name"];
    $tempname = $_FILES['image']['tmp_name'];


    


            $dir = "../images/profile-images";
	   
			if (move_uploaded_file($tempname,$dir.'/'.$imagename)){
					 echo "User Picture Uploaded...!";
				 }
				 else{
					 echo "Not Working...";
				 }


                 
    $query = "UPDATE user SET `role_id` = '$role_id' , `first_name` = '$first_name' , `user_image` = '$imagename' , `last_name` = '$last_name' , `email` = '$email' , `gender` = '$gender' , `date_of_birth` = '$date_of_birth' WHERE `user_id` = '$user_id'";

    $result = mysqli_query($connection, $query);

    if($result){
            header('location:../active-users.php?msg=User Edit Successfully');
        echo "User Updated Successfully";

    }
    else {
        echo "Update Failed";
    }

}


?>