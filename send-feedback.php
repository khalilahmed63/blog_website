


<?php
  session_start();

  require_once 'required/connection.php';


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



	<title>Feedback</title>



    <script>
          function form_validation(){
            var is_validate = true;
                // Input Fields Data
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var feedback = document.getElementById("feedback").value;
          
            // Input Fields Patterns
            var alphabets_pattern = /^[a-z]{3,15}$/i;
            var email_pattern = new RegExp(/^[a-z0-9]{3,15}@[a-z]{5,10}\.(com|org)$/i);
           


              if(name == ""){
                is_validate = false;
                document.getElementById("name_msg").innerHTML  = "Please Enter Your Name";
              }
              else{
                document.getElementById("name_msg").innerHTML = "";
                if(!alphabets_pattern.test(first_name)){
                  is_validate = false;
                  document.getElementById("name_msg").innerHTML  = "Your Name Should Contain only Alphabets range[3-15]";
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


              if(feedback == ""){
                is_validate = false;
                document.getElementById("feedback_msg").innerHTML  = "Please Enter Your Feedback";
              }
              else{
                document.getElementById("feedback_msg").innerHTML  = "";
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
?>


	<section class=" gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
    	<?php

    		if (isset($_REQUEST['msg'])) {
    			echo "<h4 class='text-center mb-4 text-white'>".$_REQUEST['msg']."</h4>";
    		}

    	?>
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Send Us Your Feedback</h3>
            <form action="php-files/feedback-process.php" method="POST" onsubmit="return form_validation()">



<?php

  if (isset($_SESSION['user'])) {
    ?>
    <input type="hidden" id="name" name="name" value="<?php echo $_SESSION['user']['first_name'] ?>" />
    <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>" />
    <?php
  }
  else{
    ?>
 <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                    <label class="form-label" for="name">First Name</label>
                    <span id="name_msg" class="text-danger text-right"></span>
                  </div>

                </div>
                 <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" onblur="email_check()" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                    <span id="email_msg" class="text-danger"></span>
                  </div>

                </div>
                
                
              </div>

    <?php
  }

?>
             



              <div class="row">
                
                <div class="col-md-12 mb-4">

                  <textarea type="text" class="form-control form-control-lg" name="feedback" id="feedback" ></textarea>
                  <label for="feedback" class="form-label">Feedback Message</label>
                  <span id="feedback_msg" class="text-danger"></span>
                 


                </div>
                
              </div>



              



              <div class="mt-4 pt-2 d-flex justify-content-end">
                <input class="btn btn-warning" type="submit" name="send_feedback" value="Send Feedback" />
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


   

</body>
</html>