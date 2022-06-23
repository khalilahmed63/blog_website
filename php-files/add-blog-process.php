<?php

session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
     
      $user_id = $_SESSION['user']['user_id']


?>


<?php
  date_default_timezone_set("Asia/Karachi");
  if (isset($_POST['save_category'])) {


    $blog_title = $_POST['blog_title'];
    $ppp = $_POST['ppp'];
    $blog_status = $_POST['blog_status'];
    $imagename = $_FILES["image"]["name"];
    $tempname = $_FILES['image']['tmp_name'];




    if ($blog_title === '') {
      header('location:../admin-blog.php?msg=blog_title is empty');
    }

    if ($ppp === '') {
      header('location:../admin-blog.php?msg=Post per Page is Empty');
    }

    if ($imagename === '') {
      header('location:../admin-blog.php?msg=Please Insert Image');
    }

    if ($blog_status === '') {
      header('location:../admin-blog.php?msg=blog_status is Empty');
    }


    if ($blog_title === '' && $ppp === '' && $image === '' && $blog_status === '') {
      header('location:../admin-blog.php?msg=Please Insert Data');
    }


   
    $time_stamp = date("Y-m-d h:i:s");
    if ($blog_title !== '' &&  $ppp !== '' && $imagename !== '' && $blog_status !== '' ) {
     

        
         
      $query = "INSERT INTO blog (`user_id`, `blog_title`, `post_per_page`, `blog_background_image`, `blog_status`, `created_at`, `updated_at`) VALUES ('$user_id', '$blog_title', '$ppp', '$imagename', 'Active', '$time_stamp', '$time_stamp')";

      $result = mysqli_query($connection, $query);


      $dir = "../images/blog-bg-images";

			if (!is_dir($dir)) 
			{
        mkdir($dir);
				echo "Directory Created";
			}   
		    else
		    {
		    	// echo "Not Created";
		    }
			
			
			
      $dir = "../images/blog-bg-images";
	   
			if (move_uploaded_file($tempname,$dir.'/'.$imagename)){
					 echo "Blog Picture Uploaded...!";
				 }
				 else{
					 echo "Not Working";
				 }
    

      if ($result) {
      header('location:../admin-blog.php?message=Blog Add Successfully');
      }
      else{
        header('location:../admin-blog.php?message=Blog Failed ');
      }
     
      

    } 

      




  }

?>


?>