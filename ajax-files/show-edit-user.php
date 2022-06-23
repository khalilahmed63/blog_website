<?php
include_once('../required/connection.php');

if(isset($_REQUEST['user_id'])){

  $user_id = $_REQUEST['user_id'];

  $query = "SELECT * FROM user WHERE user_id = '".$user_id."'";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_assoc($result);

  $role_id = $row['role_id'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $gender = $row['gender'];
  $date_of_birth = $row['date_of_birth'];
  $address = $row['address'];
  $user_image = $row['user_image'];
}

?>


                   <!-- form start -->
                

            <div class="row justify-content-center align-items-center h-100">
              <div class="col-12 ">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                  <div class="card-body p-4 p-md-5">
                    <form method="POST" action="ajax-files/edit-user.php" enctype="multipart/form-data" onsubmit="return form_validation()" >
                    <input type='hidden' name='user_id' value='<?php echo $user_id ; ?>'/>


                  
                       <!-- profile picture start-->

                        <div class="bg-warning p-3">
                            <div class="profile-pic my-4">
                            <label class="-label" for="file">
                              <span class=""><i class="fa fa-camera"></i></span>
                              <span>Change Image</span>
                            </label>
                            <input id="file" type="file" name="image" onchange="loadFile(event)"/>
                            <img src="images/profile-images/<?= $user_image?>"  id="output" width="200" />
                          </div>
                        </div>

                        <!-- profile picture end-->
            

                    <div class="row">
                        <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Role Id</h5>
                            <select class="form-select" name="role_id" aria-label="Default select example">
                                <option selected value="2">2</option>
                                <option value="1">1</option>
                              
                            </select>
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>

                        <div class="col-md-6 mb-4">
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">First Name</h5>
                          <div class="form-outline">
                            <input type="text" id="first_name" name="first_name" value='<?php echo $first_name; ?>' class="form-control form-control-lg" />
                            <p id="first_name_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                      </div>

                   
                    
                    
                    <div class="row">
                      <div class="col-md-6 mb-4">
                      <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">Last Name</h5>
                    
                        <div class="form-outline">
                          <input type="text" id="last_name" name="last_name" value='<?php echo $first_name; ?>' class="form-control form-control-lg" />
                          <p id="last_name_msg" class="text-danger text-center"></p>
                        </div>
            
                      </div>

                      <div class="col-md-6 mb-4">
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-2 text-center">User Email</h5>
                          <div class="form-outline">
                            <input type="text" id="email" name="email" value='<?php echo $email; ?>' class="form-control form-control-lg" />
                            <p id="email_msg" class="text-danger text-center"></p>
                          </div>
              
                        </div>
                    </div>



        
                   
                      <div class="row">
                        <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">User Gender</h5>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option selected value="Male">Male</option>
                                <option value="Male">Female</option>
                              
                            </select>
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>

                        <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Date Of Birth</h5>
                            <input type="date" name='date_of_birth' value='<?php echo $date_of_birth; ?>'>
                            <p id="dob_msg" class="text-danger text-center"></p>
                          </div>

                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4 d-flex align-items-center">

                          <div class="form-outline datepicker w-100">
                            <h5 class="mb-4 mb-md-2 text-center">Address</h5>
                            <div class="form-outline">
                          <input type="text" id="last_name" name="last_name" value='<?php echo $address; ?>' class="form-control form-control-lg" />
                          <p id="last_name_msg" class="text-danger text-center"></p>
                        </div>
                            <p id="image_msg" class="text-danger text-center"></p>
                          </div>

                        </div>

                         

                        </div>


                    
                        <div class="mt-4 p-2 d-flex justify-content-end">
                        <input class="btn btn-warning" type="submit" value="Save Changes" name="save_changes" />
                      </div>




                      </div>

                   
                     


                     




                    </form>
                  </div>
                </div>
              </div>
            </div>
      <!-- form end -->
                  
    