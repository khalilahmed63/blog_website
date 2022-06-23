<?php 
require_once 'required/connection.php';
session_start();
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



    <title>Contact Us</title>

    
  </head>
  <body>


      <!-- include navbar -->
<?php
  include 'include/navbar.php';

?>

  <!-- main content section start -->
   <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <?php
      
      if (isset($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
        echo "<h5 class='text-white text-center'> $msg  </h5>";
      }

      ?>
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration border" style="border-radius: 15px;" >
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 ">Contact Us</h3>
            <form action="php-files/contact-us-process.php" method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" name='first_name' class="form-control form-control-lg " />
                    <label class="form-label  fw-bold" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" />
                    <label class="form-label  fw-bold" for="last_name">Last Name</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label  fw-bold" for="emailAddress">Email</label>
                  </div>

                </div>
                 <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" name='phone' class="form-control form-control-lg" />
                    <label class="form-label  fw-bold" for="phoneNumber">Phone Number</label>
                  </div>

                </div>
              </div>

              <div class="row">
                
                <div class="col-md-12 mb-4 pb-2">

                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave your Message here" name='message' id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Message</label>
                  </div>

                </div>
              </div>

              <div class="d-grid gap-2 col-sm-12 col-md-12  mx-auto">
                <input type="submit" name="send" class="send btn btn-warning btn-lg" value="send">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- main content section end -->





<!-- include footer -->
<?php
    include 'include/footer.php';
?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  </body>
</html>