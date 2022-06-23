  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM category";

      $result = mysqli_query($connection, $query) ;



?>
 
          <!-- form start -->
          <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                      <div class="card-body p-4 p-md-5">
                        <!-- <form method="POST" enctype="multipart/form-data" onsubmit="return form_validation()" > -->
    
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Category Title</h5>
                        
                          <div class="row">
                            <div class="col-md-12 mb-4">
    
                              <div class="form-outline">
                                <input type="text" id="add_category_title" name="category_title" class="form-control form-control-lg" />
                                <p id="category_title_msg" class="text-danger text-center"></p>
                              </div>
                  
                            </div>
                          </div>
    
    
                         
    
                          <div class="row">
                            <div class="col-12 mb-4">
    
                             <!-- tiny mce editor -->
                             <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Category Description</h5>
                             <textarea name="category_desc"  id="add_category_desc" rows="8" style="width: 100%;"></textarea>
                             <p id="category_desc_msg" class="text-danger text-center"></p>
                              
                              <!-- tiny mce editor -->
    
                            </div>
                          </div>
    
    
    
    
    
                          <div class="col-12 mt-4 pt-2 d-flex justify-content-end">
                            <!-- <input class="btn btn-warning" type="submit" id='save_category' value="Save" name="save_category" /> -->
                            <button class="btn btn-warning" onclick='add_category()' id='save_category' name="save_category" >Add Category</button>
                        </div>
                       
    
    
    
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </div>
          <!-- form end -->
