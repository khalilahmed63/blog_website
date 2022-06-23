<?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
     

  
      $time_stamp = date("Y-m-d h:i:s");
?>


<?php
  date_default_timezone_set("Asia/Karachi");
  if (isset($_POST['publish'])) {


    $blog_id = $_POST['blog_id'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $desc = $_POST['desc'];
    $imagename = $_FILES["image"]["name"];
    $tempname = $_FILES['image']['tmp_name'];




    if ($title === '') {
      header('location:../admin-post.php?message=Title is empty');
    }

    if ($summary === '') {
      header('location:../admin-post.php?message=Summary is Empty');
    }

    if ($desc === '') {
      header('location:../admin-post.php?message=Desc is Empty');
    }

    if ($imagename === '') {
      header('location:../admin-post.php?message=Please Insert Image');
    }


    if ($title === '' && $summary === '' && $desc === '' && $imagename === '') {
      header('location:../admin-post.php?message=Please Insert Data');
    }


 
    if ($title !== '' &&  $summary !== '' && $desc !== '' && $imagename !== '' ) {
      
      $query = "INSERT INTO post (`blog_id`, `post_title`, `post_summary`, `post_description`, `featured_image`, `post_status`, `updated_at`) VALUES ('$blog_id', '$title', '$summary', '$desc', '$imagename', 'Active', '$time_stamp')";

      $result = mysqli_query($connection, $query);


      
    

      $dir = "../images/blog-images";

			if (!is_dir($dir)) 
			{
        mkdir($dir);
				echo "Directory Created";
			}   
		    else
		    {
		    	// echo "Not Created";
		    }

			
      $dir = "../images/blog-images";
	   
			if (move_uploaded_file($tempname,$dir.'/'.$imagename)){
					 echo "Blog Picture Uploaded...!";
				 }
				 else{
					 echo "Not Working";
				 }
    

      if ($result) {
          
    $time_stamp = date("Y-m-d h:i:s");
        $post_id = mysqli_insert_id($connection);
        $query2 = "INSERT INTO post_category (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES ('".$post_id."', '".$category."', '$time_stamp', '$time_stamp')";
        
        $result2 = mysqli_query($connection, $query2);
      header('location:../admin-post.php?message=Posted Successfully');
      }
      else{
        header('location:../admin-post.php?message=Post Failed ');
      }
     
      

    } 

      




  }

?>