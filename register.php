


<?php
  session_start();

  require_once 'required/connection.php';

  if(isset($_SESSION['user'])){
    header("location:index.php");       
  }

?>
  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- fontawesome icon link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
  *{
    
    box-sizing: border-box;
  }
  a{
    text-decoration: none;
    color: black;
  }


   body{
     background: url(images/other-images/about-bg.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

    

  }
 
</style>



	<title>Register</title>



    <script>
          function form_validation(){
            var is_validate = true;
                // Input Fields Data
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var email = document.getElementById("email").value;
            var dob = document.getElementById("dob").value;
            var gender_male = document.getElementById("gender_male").checked;
            var gender_female = document.getElementById("gender_female").checked;
            var gender_other = document.getElementById("gender_other").checked;
            var address = document.getElementById("address").value;
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var image = document.getElementById("image").value;


            // Input Fields Patterns

            var alphabets_pattern = /^[a-z]{3,15}$/i;
            var email_pattern = new RegExp(/^[a-z0-9]{3,30}@[a-z]{2,20}\.(com|org)$/i);
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

             



               if(password == ""){
                is_validate = false;
                document.getElementById("password_msg").innerHTML  = "Please Enter Email";
              }
              else{
                document.getElementById("password_msg").innerHTML = "";
                if(!password_pattern.test(password)){
                  is_validate = false;
                  document.getElementById("password_msg").innerHTML  = "Password Should atleast 7 charachter long and it Should contain number and characters";
                }
              }


               if(confirm_password == ""){
                is_validate = false;
                document.getElementById("confirm_password_msg").innerHTML  = "Please Enter Confirm Password";
                }
              else{
                document.getElementById("confirm_password_msg").innerHTML = "";
                if(!password_pattern.test(confirm_password)){
                  is_validate = false;
                  document.getElementById("confirm_password_msg").innerHTML  = "Confirm Password Should atleast 7 charachter long and it Should contain number and characters";
                }
                else{
                  if (password != confirm_password){
                          document.getElementById("confirm_password_msg").innerHTML = "Password not matched";
                          is_validate = false;
                    }
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


</head>
<body>

  <!-- include navbar -->
<?php
  include 'include/navbar.php';


  if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
    echo "<p class='pt-5 text-center fw-bold text-danger'>$msg</p>";
  }
?>




	<section class=" gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="php-files/register-process.php" method="POST" enctype="multipart/form-data" onsubmit="return form_validation()">



              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" />
                    <label class="form-label" for="first_name">First Name</label>
                    <span id="first_name_msg" class="text-danger text-right"></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" />
                    <label class="form-label" for="last_name">Last Name</label>
                    <span id="last_name_msg" class="text-danger"></span>
                  </div>

                </div>
              </div>



              <div class="row">
                <div class="col-md-12 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" onblur="email_check()" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                    <span id="email_msg" class="text-danger"></span>
                  </div>

                </div>
              </div>

               <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" name="dob" id="dob" />
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
                
                <div class="col-md-12 mb-4">

                  <input type="text" class="form-control form-control-lg" name="address" id="address" />
                  <label for="address" class="form-label">Address</label>
                  <span id="address_msg" class="text-danger"></span>
                 


                </div>
                
              </div>



               <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">New Password</label>
                    <span id="password_msg" class="text-danger"></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="Password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" />
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <span id="confirm_password_msg" class="text-danger"></span>
                  </div>

                </div>
              </div>



               <div class="row">
                <div class="col mb-4 pb-2">
                  <div class="form-outline datepicker w-100">

                 <label class="form-label select-label">Choose Image</label>
                  <span id="image_msg" class="text-danger"></span>
                  <input type="file" name="image" id="image">

                  </div>


                </div>
              </div>




              <div class="mt-4 pt-2 d-flex justify-content-end">
                <input class="btn btn-warning" type="submit" name="register" value="Register" />
              </div>




                <div class="col-md-12 pt-5 d-flex justify-content-center align-items-center  ">

                  <div class=" ">
                     
                       <p>I Have Already An Account <a href="login.php"> Login</a></p> 
                   
                   </div>

              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- include footer -->
<?php
    include 'include/footer.php';
?>



<!-- navbar scroll effect  -->
 <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
      window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
          // remove padding top from body
          document.body.style.paddingTop = '0';
        }
      });
    }); 
  </script>



 <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


    <!-- check the email already exist or not -->
    <script type="text/javascript">
      
      function email_check(){
        var email = document.getElementById("email").value;

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/email-check.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("email="+email);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("email_msg").innerHTML=this.responseText;
          
          }
        }
      }
    </script>


</body>
</html>