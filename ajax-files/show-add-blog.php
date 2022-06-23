  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM blog";

      $result = mysqli_query($connection, $query) ;



?>
 
          <!-- form start -->
          <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                      <div class="card-body p-4 p-md-5">
                        <form method="POST" action="php-files/add-blog-process.php" enctype="multipart/form-data" onsubmit="return form_validation()" >
                        
    
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Blog Title</h5>
                        
                          <div class="row">
                            <div class="col-md-12 mb-4">
    
                              <div class="form-outline">
                                <input type="text" id="add_blog_title" name="blog_title" class="form-control form-control-lg" />
                                <p id="blog_title_msg" class="text-danger text-center"></p>
                              </div>
                  
                            </div>
                          </div>
    
                          <div class="row">
                            <div class="col-md-6 mb-4 ">
                                  <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Per Page</h5>
                                  <select class="form-select " name='ppp' id="ppp" aria-label="Default select example">
                                      <option value="2"><a class='dropdown-item' href=''>2</a></option>
                                      <option value="4"><a class='dropdown-item' href=''>4</a></option>
                                      <option value="6"><a class='dropdown-item' href=''>8</a></option>
                                      <option value="8"><a class='dropdown-item' href=''>10</a></option>
                                    
                                  </select>
                                  <p id="ppp-msg" class="text-danger text-center"></p>
                                </div>
                                <div class="col-md-6 mb-4 ">
                                      <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Background Image</h5>
                                      
                                        <p id="images_msg" class="text-danger text-center"></p>
                                        <input type="file" class="form-control " name="image" id="image" />
                                        <p id="image_msg" class="text-danger text-center"></p>
                                      
                                    </div>
                          </div>
    
    
                         
    
                          <div class="row">
                            <div class="col-12 mb-4">
        
                                  <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Post Stus</h5>
                                  <select class="form-select " name='blog_status' aria-label="Default select example">
                                      <option selected value="Active"><a class='dropdown-item' href=''>Active</a></option>
                                      <option value="InActive"><a class='dropdown-item' href=''>In-Active</a></option>
                                    
                                  </select>
                                  <p id="status_msg" class="text-danger text-center"></p>
                              
    
                            </div>
                          </div>
    
    
    
    
    
                          <div class="col-12 mt-4 pt-2 d-flex justify-content-end">
                          
                            <button type='submit' class="btn btn-warning" id='save_category' name="save_category" >Add Blog</button>
                        </div>
                       
    
    
    
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </div>
          <!-- form end -->
