<?php

require_once '../required/connection.php';		

if(isset($_REQUEST['category_id']) && $_REQUEST['action'] == 'inactive_category'){
    $category_id = $_REQUEST['category_id'];
    // echo" yes";
$user_category = $_REQUEST['category_id'];
 
$query = "UPDATE category SET `category_status` = 'InActive' WHERE `category_id` = '".$category_id."'";

$result = mysqli_query($connection, $query);

if($result){
    echo "Category InActivated Successfully";
    }
else{
    echo "faild";
    }

    
}

if(isset($_REQUEST['category_id']) && $_REQUEST['action'] == 'delete_category'){

    $category_id = $_REQUEST['category_id'];
    $user_category = $_REQUEST['category_id'];


     
    $query = "DELETE FROM category WHERE `category_id` = '".$category_id."'";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Category deleted Successfully";
    }
    else{
        echo "faild";
    }

    
}

if(isset($_REQUEST['category_id']) && $_REQUEST['action'] == 'active_category'){

    $category_id = $_REQUEST['category_id'];
    $user_category = $_REQUEST['category_id'];


   
    $query = " UPDATE category SET `category_status` = 'Active' WHERE `category_id` = '".$category_id."'";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Category activated Successfully";
    }
    else{
        echo "faild";
    }

    
}

?>
