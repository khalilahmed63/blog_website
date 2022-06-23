
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- fontawesome icon link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">


    <script>
      function form_validation(){
        		var is_validate = true;

                // Input Fields Data
        		var email = document.getElementById("login-email").value;
        		var password = document.getElementById("login-password").value;
        	


        		// Input Fields Patterns

        		var alphabets_pattern = /^[a-z]{3,15}$/i;
        		var email_pattern = new RegExp(/^[a-z0-9]{1,30}@[a-z]{1,30}\.(com|org)$/i);
        	

            
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

              var password_pattern=  /^[A-Za-z]\w{7,14}$/;
        	     if(password == ""){
                is_validate = false;
                document.getElementById("password_msg").innerHTML  = "Please Enter Email";
              }
              // else{
              //   document.getElementById("password_msg").innerHTML = "";
              //   if(!password_pattern.test(password)){
              //     is_validate = false;
              //     document.getElementById("password_msg").innerHTML  = "Password Should atleast 7 charachter long and it Should contain number and characters";
              //   }
              // }


               

        	 
        		if(is_validate){

        			return true;
        		}
        		else{
        			return false;
        		}
        	}
        </script>



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


	<title>Login Page</title>


</head>
<body >


<!-- include navbar -->
<?php
    include 'include/navbar.php';
?>

  <div class="container mt-5"> 
     <?php

              if (isset($_GET['reg_msg'])) {
                  echo "<p class='text-success text-center fw-bold'>".$_GET['reg_msg']."</ p>";
              }

            ?> 
             <?php

              if (isset($_GET['msg'])) {
                  echo "<p class='text-success text-center fw-bold'>".$_GET['msg']."</p>";
              }

            ?>
    <div class="row justify-content-center align-items-center h-100"style="min-height: 700px;" >
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Login Form</h1>

           
            <p class='text-danger text-center' id="msg"></p>
            
            <form action="php-files/login-process.php" method="POST" onsubmit="return form_validation()">


              <div class="d-grid gap-2 col-sm-12 col-md-8  mx-auto">
                <label class="form-label" for="login-email">Email</label>
                    <input type="emai" name="email" id="login-email" class="form-control form-control-lg" />
                    <span id="email_msg"  class='text-danger d-flex justify-content-center' ></span>
              </div>

              <div class="d-grid gap-2 col-sm-12 col-md-8  mx-auto">
                 <label class="form-label" for="login-password" >Password</label>
                    <input type="Password" name="password" id="login-password"  class="form-control form-control-lg" />
                    <span id="password_msg" class='text-danger d-flex justify-content-center  '></span>
              </div>
                
               
                <div class="col-md-12 p-2 d-flex justify-content-center align-items-center  ">

                    <div class="checkbox ">
                       <label>
                         <input type="checkbox" value="remember-me"> Remember me
                       </label>
                     </div>

                     
                    </div>
                    
                    
                    <div class="d-grid gap-2 col-sm-12 col-md-8 mb-3 mx-auto">
                      <input type="submit" name="login" class="btn btn-warning " value="Login">
                    </div>
                    <p class="text-center mb-3"><a class="" href="forget-password.php">Forgot password?</a></p>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

              <div class="col-md-12 py-5 d-flex justify-content-center align-items-center  ">

                  <div class="">
                     
                       <p>No Account <a href="register.php"> Create New</a></p> 
                   
                   </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>





<!-- include footer -->
<?php
    include 'include/footer.php';
?>








         <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


 <!-- check Email/password invalid or not -->
    <!-- <script type="text/javascript">
       
      function checkuser(){
        console.log('hello');
        var email = document.getElementById("login-email").value;
        var password = document.getElementById("login-password").value;

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/login-ajax.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("email="+email+"&password="+password);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("msg").innerHTML=this.responseText;
          
          }
        }
      }
    </script> -->






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



</body>
</html>