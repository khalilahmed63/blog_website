
<?php
require_once '../required/connection.php';
if ($_REQUEST['action'] == 'add_category'){

    $category_title = $_REQUEST['title'];
    $category_desc = $_REQUEST['desc'];

    $time_stamp = date("Y-m-d h:i:s");

    $add_category_query = " INSERT INTO category (`category_title`, `category_description`, `category_status`, `updated_at`) VALUES ('$category_title', '$category_desc', 'Active', '$time_stamp')";
    $add_category_result = mysqli_query($connection, $add_category_query);

    if ($add_category_result) {
        // header('location:../categories.php');
        echo "Category Inserted Successfully";
    }
    else{
        // header('location:../category.php');
        echo "Category Not Inserted";
    }
    

   
}
?>