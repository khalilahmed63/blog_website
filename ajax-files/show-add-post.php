<?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
     

      $category_query = "SELECT * FROM category";  
      $category_result = mysqli_query($connection, $category_query);

      $blog_query = "SELECT * FROM blog";  
      $blog_result = mysqli_query($connection, $blog_query);





?>

<!-- tiny mce editor  -->
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="style.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
<!-- tiny mce editor  -->




<script>
          function form_validation(){
            var is_validate = true;
            // Input Fields Data

            var title = document.getElementById("title").value;
            var summary = document.getElementById("summary").value;
            var desc = document.getElementById("desc").value;
            var image = document.getElementById("image").value;
            

            // Input Fields Patterns
            
            var alphabets_pattern = /^[a-z]{3,10000}$/i;
            
            
            if(title == ""){
                is_validate = false;
                document.getElementById("title_msg").innerHTML  = "Please Enter Post Title";
              }
              else{
                if(!alphabets_pattern.test(title)){
                  is_validate = false;
                  document.getElementById("title_msg").innerHTML  = "Title range 3 to 1000 ";
                }
                else{
                  document.getElementById("title_msg").innerHTML  = "";
                }
              }
          
              if(summary == ""){
                is_validate = false;
                document.getElementById("summary_msg").innerHTML  = "Please Enter Post summary";
              }
              else{
                if(!alphabets_pattern.test(summary)){
                  is_validate = false;
                  document.getElementById("summary_msg").innerHTML  = "summary range 3 to 1000 ";
                }
                else{
                  document.getElementById("summary_msg").innerHTML  = "";
                }
              }
          
            
            
              if(desc == ""){
                is_validate = false;
                document.getElementById("desc_msg").innerHTML  = "Please Enter Post description";
              }
              else{
                if(!alphabets_pattern.test(desc)){
                  is_validate = false;
                  document.getElementById("desc_msg").innerHTML  = "description range 3 to 1000 ";
                }
                else{
                  document.getElementById("desc_msg").innerHTML  = "";
                }
              }

           
              if(image == ""){
                is_validate = false;
                document.getElementById("image_msg").innerHTML  = "Please Select an Image";
              }
              else{
                document.getElementById("image_msg").innerHTML  = "";
              }




            if(is_validate){
              return true;
            }
            else{
              return false;
            }
          }
        </script>


    <title>Add posts</title>
  </head>
  <body>

   <div class="wrapper">
       
        <!-- Page Content start -->
        <div id="content">

     <!-- main box inside start -->
    <div class="border rounded">
      <h2 class="p-3">Add Post</h2>
    <div class="container  my-4 p-4 col-md-12">
      

  <?php
    if (isset($_GET['msg'])) {
           echo "<p class='text-success text-center'>".$_GET['msg']."</ p>";
       }
  ?> 


      <!-- form start -->
            <div class="row justify-content-center align-items-center h-100">
              <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                  <div class="card-body p-4 p-md-5">
                    <form method="POST" action="php-files/add-post-process.php" enctype="multipart/form-data" onsubmit="return form_validation()" >

                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Blog</h5>

                          <select class="form-select" aria-label="Default select example " name='blog_id'>
                        <?php
                            if ($blog_result->num_rows) {
                            while($blog_row = mysqli_fetch_assoc($blog_result)){
                              
                              echo "
                              <option value=".$blog_row['blog_id'].">".$blog_row['blog_title']."</option>";
                            }
                          }
                          else{
                            echo "
                            <option value=''>No Categories</option>
                            ";
                          }
                          
                          ?>
                      </select>
              
                        </div>
                        <div class="col-md-6 mb-4">
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Category</h5>
        
                        <select class="form-select" aria-label="Default select example " name='category'>
                        <?php
                            if ($category_result->num_rows) {
                            while($category_row = mysqli_fetch_assoc($category_result)){
                              
                              echo "
                              <option value=".$category_row['category_id'].">".$category_row['category_title']."</option>";
                            }
                          }
                          else{
                            echo "
                            <option value=''>No Categories</option>
                            ";
                          }
                          
                          ?>
                      </select>
                  

                    </li>
                          </div>
                      </div>
                    

                      <div class="row">
                        <div class="col-md-12 mb-4">
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Title</h5>

                          <div class="form-outline">
                            <input type="text" id="title" name="title" class="form-control form-control-lg" />
                            <p id="title_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                      </div>


                      
                      <div class="row">
                        <div class="col-md-12 mb-4">
                          <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Summary</h5>

                          <div class="form-outline">
                            <input type="text" id="summary" name="summary" class="form-control form-control-lg" />
                            <p id="summary_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 mb-4">

                         <!-- tiny mce editor -->
                         <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Enter Post Description here</h5>
                         <textarea name="desc"  id="desc" rows="8" style="width: 100%;"></textarea>
                         <p id="desc_msg" class="text-danger text-center"></p>
                          
                          <!-- tiny mce editor -->

                        </div>
                      </div>




                      <div class="row">
                        <div class="col-md-12 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Post Images</h5>
                            <p id="images_msg" class="text-danger text-center"></p>
                            <input type="file" class="form-control " name="image" id="image" />
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>
                      </div>


                      <div class="mt-4 pt-2 d-flex justify-content-end">
                        <!-- <input class="btn btn-dark mx-3" type="submit" value="Draft" name="draft" /> -->
                        <input class="btn btn-warning" type="submit" value="Publish" name="publish" />
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
      <!-- form end -->

    </div>
    </div><!-- main box inside end -->
        
    </div><!-- Page Content end -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
