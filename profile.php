
 <?php session_start(); ?> 
<?php require_once 'required/connection.php';


if (isset($_SESSION['user'])){

        $user_query = "SELECT * FROM user where user_id = ".$_SESSION['user']['user_id']."";
        $user_result = mysqli_query($connection, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);
      
}
else{
  header('location:index.php');
}




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- fontawesome icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- coustom css -->
    <link rel="stylesheet" type="text/css" href="css/profile.css">


    <title>User Profile</title>

    <script>
          function form_validation(){
            var is_validate = true;
                // Input Fields Data
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var email = document.getElementById("email").value;
            var phone_no = document.getElementById("phone").value;
            var dob = document.getElementById("dob").value;
            var gender_male = document.getElementById("gender_male").checked;
            var gender_female = document.getElementById("gender_female").checked;
            var gender_other = document.getElementById("gender_other").checked;
            var address = document.getElementById("address").value;
            var password = document.getElementById("password").value;
            var image = document.getElementById("image").value;


            // Input Fields Patterns

            var alphabets_pattern = /^[a-z]{3,15}$/i;
            var email_pattern = new RegExp(/^[a-z0-9]{3,15}@[a-z]{5,10}\.(com|org)$/i);
            var phone_no_pattern = /^[+]92[\d]{3}-[0-9]{7}$/;
            var address_pattern = /^[\w\W]{10,100}$/;
            var password_pattern=  /^[A-Za-z]\w{7,14}$/;


              if(first_name == ""){
                is_validate = false;
                document.getElementById("first_name_msg").innerHTML  = "Please Enter First Name";
              }
              else{
                document.getElementById("first_name_msg").innerHTML = "";
                if(!alphabets_pattern.test(first_name)){
                  is_validate = false;
                  document.getElementById("first_name_msg").innerHTML  = "First Name Should Contain only Alphabets range[3-15]";
                }
              }

              if(last_name != ""){
                if(!alphabets_pattern.test(last_name)){
                  is_validate = false;
                  document.getElementById("last_name_msg").innerHTML  = "Last Name Should Contain only Alphabets range[3-15]";
                }
                else{
                  document.getElementById("last_name_msg").innerHTML  = "";
                }
              }

              if(email == ""){
                is_validate = false;
                document.getElementById("email_msg").innerHTML  = "Please Enter Email";
              }
              else{
                document.getElementById("email_msg").innerHTML = "";
                if(!email_pattern.test(email)){
                  is_validate = false;
                  document.getElementById("email_msg").innerHTML  = "Email Should Be Like: abc@gmail.com";
                }
              }



              // flag = document.getElementById("flag").value;
              // console.log(flag);
              // if(flag == 'false'){
              //   is_validate = false;

              // }
              // else{
              //   is_validate = false;
              // }





              if(phone_no == ""){
                is_validate = false;
                document.getElementById("phone_no_msg").innerHTML  = "Please Enter Phone No";
              }
              else{
                document.getElementById("phone_no_msg").innerHTML = "";
                if(!phone_no_pattern.test(phone_no)){
                  is_validate = false;
                  document.getElementById("phone_no_msg").innerHTML  = "Phone No Should Be Like: +92333-1234567";
                }
              }
              

                if(address == ""){
                is_validate = false;
                document.getElementById("address_msg").innerHTML  = "Please Enter Address";
              }
              else{
                document.getElementById("address_msg").innerHTML = "";
                if(!address_pattern.test(address)){
                  is_validate = false;
                  document.getElementById("address_msg").innerHTML  = "Address Length Min:10 Max:100";
                }
              }


                if(dob == ""){
                is_validate = false;
                document.getElementById("dob_msg").innerHTML  = "Please Enter Date of Birth";
              }
              else{
                document.getElementById("dob_msg").innerHTML = "";
                
              }


              // alert("Male: "+gender_male);
              // alert("Female: "+ gender_female);

              if(!gender_male && !gender_female && !gender_other){
                is_validate = false;
                document.getElementById("gender_msg").innerHTML  = "Please Select Gender";
              }
              else{
                document.getElementById("gender_msg").innerHTML  = "";
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


  </head>
  <body class="bg-light">


      <!-- include navbar -->
<?php
  include 'include/navbar.php';
?>





  <!-- main content section start -->
              <form action="php-files/profile-update-process.php" method="POST" enctype="multipart/form-data" onsubmit="return form_validation()">
    <section class="h-100 bg-light">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <?php 
          if (isset($_REQUEST['msg'])) {
          echo "<p class='text-center fw-bold text-success'>".$_REQUEST['msg']."</p>";
        
      } ?>
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
           






  <!-- profile picture start-->

           <div class="bg-warning col-xl-3">
              <div class="profile-pic my-4">
              <label class="-label" for="file">
                <span class=""><i class="fa fa-camera"></i></span>
                <span>Change Image</span>
              </label>
              <input id="file" type="file" name="image"  onchange="loadFile(event)"/>
              <input id="file2" type="hidden" name="image2" value='<?= $user_row['user_image']?>'/>
              <img src="images/profile-images/<?= $user_row['user_image']?>"  id="output" width="200" />
            </div>
           </div>

  <!-- profile picture end-->

  
            <div class="col-xl-8 ">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Edit Profile</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" value="<?= $user_row['first_name'] ?>" />
                      <label class="form-label" for="first_name">First name</label>
                      <span id="first_name_msg" class="text-danger text-right"></span>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="<?= $user_row['last_name'] ?>" />
                      <label class="form-label" for="last_name">Last name</label>
                      <span id="last_name_msg" class="text-danger"></span>
                    </div>
                  </div>
                </div>

                

                <div class="row">
                <div class="col-md-12 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" name="email" value="<?= $user_row['email'] ?>" onblur="email_check()" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                    <span id="email_msg" class="text-danger"></span>
                  </div>

                </div>
               
              </div>


               <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" name="dob" id="dob" value="<?= $user_row['date_of_birth'] ?>" />
                    <label for="dob" class="form-label">Birthday</label>
                    <span id="dob_msg" class="text-danger"></span>
                  </div>
                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_female"
                      value="male" checked />
                    <label class="form-check-label" for="gender_female">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_male"
                      value="female" />
                    <label class="form-check-label" for="gender_male">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_other"
                      value="other" />
                    <label class="form-check-label" for="gender_other">Other</label>
                  </div>
                  <span id="gender_msg" class="text-danger"></span>

                </div>
              </div>




              <div class="row">
                  <div class="col-md-12 mb-4 pb-2">
                  <div class="form-outline mb-4">
                    <input type="text" id="address" name="address" class="form-control form-control-lg" value="<?= $user_row['address'] ?>"  />
                    <label class="form-label" for="form3Example8">Address</label>
                  </div>
                 </div>

              </div>

                

              

                <div class="d-flex justify-content-end pt-3">
                  <button type="submit" name="profile_update" class="btn btn-warning btn-lg ms-2">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
  <!-- main content section end -->




  <!-- include footer -->
<?php
    include 'include/footer.php';
?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script type="text/javascript">
    
    var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

  </script>
  </body>
</html>