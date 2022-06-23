<?php
include_once('../required/connection.php');

if(isset($_REQUEST['post_id'])){

    $post_id = $_REQUEST['post_id'];

    $query = "SELECT * FROM POST WHERE post_id = '".$post_id."'";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    $post_title = $row['post_title'];
    $blog_id = $row['blog_id'];
    $post_id = $row['post_id'];
    $post_summary = $row['post_summary'];
    $post_description = $row['post_description'];

}

if(isset($_REQUEST['save_changes'])){

    $blog_id = $_REQUEST['blog_id'];

    $post_id = $_REQUEST['post_id'];

    $query = "SELECT * FROM POST WHERE post_id = '".$post_id."'";
    

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);
    $blog_id = $row['blog_id'];

    $post_title = $_REQUEST['title'];
    $post_summary = $_REQUEST['summary'];
    $post_description = $_REQUEST['desc'];
    $post_status = $_REQUEST['post_status'];
    $is_comment_allowed = $_REQUEST['is_comment_allowed'];
    $imagename = $_FILES["image"]["name"];
    $tempname = $_FILES['image']['tmp_name'];

    


            $dir = "../images/blog-images";
	   
			if (move_uploaded_file($tempname,$dir.'/'.$imagename)){
					 echo "Blog Picture Uploaded...!";
				 }
				 else{
					 echo "Not Working...";
				 }


     
    $query = "UPDATE post SET `blog_id` = '$blog_id' , `post_title` = '$post_title' , `post_summary` = '$post_summary' , `post_description` = '$post_description' , `featured_image` = '$imagename' , `post_status` = '$post_status' , `is_comment_allowed` = '$is_comment_allowed' WHERE `post_id` = '$post_id'";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Post Updated Successfully";

    }
    else {
        echo "Update Failed";
    }

}

?>


                   <!-- form start -->
                

            <div class="row justify-content-center align-items-center h-100">
              <div class="col-6 ">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                  <div class="card-body p-4 p-md-5">
                    <form method="POST" action="ajax-files/edit-user.php" enctype="multipart/form-data" onsubmit="return form_validation()" >
                    <input type='hidden' name='post_id' value='<?php echo $post_id ; ?>'/>
                    
                    <div class="row">
                      <div class="col-md-6 mb-4">
                          <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Blog</h5>
<?php

$query = 'select * from blog';
$result = mysqli_query($connection, $query);

$query2 = "select blog_title from blog where blog_id = '$blog_id'";
$result2 = mysqli_query($connection, $query2);

$row2 = mysqli_fetch_assoc($result2);
// print_r ($row2['blog_title']);

$blog_title = $row2['blog_title'];



?>

                          <select class="form-select" name="is_comment_allowed" aria-label="Default select example">
                            <?php
                             
                            while ($row = mysqli_fetch_assoc($result)) {
                             if($row2['blog_title'] == $row['blog_title']){
                              $falg = 'selected';
                             } 
                             else {
                               $flag = '';
                             }
                             
                             
                             if($row['blog_title']){

                              echo "<option $flag value='".$row['blog_title']."'>".$row['blog_title']."</option>";
                              
                              }

                              else {
                                 
                                echo "<option >No Blogs</option>";
                              }
                             
                            }
                          
                       
                            
                            
                            ?>
                              
                            </select>
                        


              
                        </div>
                        <div class="col-md-6 mb-4">
                          <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Title</h5>

                          <div class="form-outline">
                            <input type="text" id="title" name="title" value='<?php echo $post_title; ?>' class="form-control form-control-lg" />
                            <p id="title_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                      </div>

                      
                    

                       <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Summary</h5>
                       
                      <div class="row">
                        <div class="col-md-12 mb-4">

                          <div class="form-outline">
                            <input type="text" id="summary" name="summary" value='<?php echo $post_summary;  ?>' class="form-control form-control-lg" />
                            <p id="summary_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 mb-4">

                         <!-- tiny mce editor -->
                         <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Enter Post Description here</h5>
                         <textarea name="desc"  id="desc"  rows="8" style="width: 100%;"><?php echo $post_description; ?></textarea>
                         <p id="desc_msg" class="text-danger text-center"></p>
                          
                          <!-- tiny mce editor -->

                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Post Status</h5>
                            <select class="form-select" name="post_status" aria-label="Default select example">
                                <option selected value="Active">Active</option>
                                <option value="InActive">InActive</option>
                              
                            </select>
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>


                         <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Is Comment Allowed</h5>
                            <select class="form-select" name="is_comment_allowed" aria-label="Default select example">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              
                            </select>
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>
                      </div>

                     

                      <div class="row">
                        <div class="col-md-12 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Post Images</h5>
                            <input type="file" class="form-control " name="image" id="image" />
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>
                      </div>


                      <div class="mt-4 pt-2 d-flex justify-content-end">
                        <input class="btn btn-warning" type="submit" value="Save Changes" name="save_changes" />
                      </div>





                    </form>
                  </div>
                </div>
              </div>
            </div>
      <!-- form end -->
                  
    