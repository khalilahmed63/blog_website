<?php

require_once '../required/connection.php';		

if(isset($_REQUEST['blog_id']) && $_REQUEST['action'] == 'inactive_blog'){
    $blog_id = $_REQUEST['blog_id'];
 
    $query = "UPDATE blog SET `blog_status` = 'InActive' WHERE `blog_id` = '".$blog_id."'";

    $result = mysqli_query($connection, $query);

if($result){
    echo "Blog InActivated Successfully";
    }
else{
    echo "faild";
    }

    
}

if(isset($_REQUEST['blog_id']) && $_REQUEST['action'] == 'delete_blog'){

    $blog_id = $_REQUEST['blog_id'];


     
    $query = "DELETE FROM blog WHERE `blog_id` = '".$blog_id."'";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Blog deleted Successfully";
    }
    else{
        echo "faild";
    }

    
}

if(isset($_REQUEST['blog_id']) && $_REQUEST['action'] == 'active_blog'){

    $blog_id = $_REQUEST['blog_id'];


   
    $query = " UPDATE blog SET `blog_status` = 'Active' WHERE `blog_id` = '".$blog_id."'";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Blog Activated Successfully";
    }
    else{
        echo "faild";
    }

    
}

?>
