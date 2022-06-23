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



    <title>About Us</title>
  </head>
  <body>



      <!-- include navbar -->
<?php
  include 'include/navbar.php';
?>


<!-- crousel start -->
   <div class="container">
         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
       <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
       </div>
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="https://images.unsplash.com/photo-1650965082276-558f3057cf38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDI5fDZzTVZqVExTa2VRfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="..." height="500px">
           <div class="carousel-caption d-none d-md-block">
             <h5>First slide label</h5>
             <p>Some representative placeholder content for the first slide.</p>
           </div>
         </div>
         <div class="carousel-item">
           <img src="https://media.istockphoto.com/photos/fantastic-foggy-scenery-in-autumn-forest-picture-id1129120030?k=20&m=1129120030&s=170667a&w=0&h=APV70zDrj30srXhyJNzI69CMxiLT1nDxu0DnfeANUgA=" class="d-block w-100" alt="..." height="500px">
           <div class="carousel-caption d-none d-md-block">
             <h5>Second slide label</h5>
             <p>Some representative placeholder content for the second slide.</p>
           </div>
         </div>
         <div class="carousel-item">
           <img src="https://images.unsplash.com/photo-1494783367193-149034c05e8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="..." height="500px">
           <div class="carousel-caption d-none d-md-block">
             <h5>Third slide label</h5>
             <p>Some representative placeholder content for the third slide.</p>
           </div>
         </div>
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
     </div>

   </div>

<!-- crousel end -->



  <!-- main content section start -->
   <div class="container">
     <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-3">
        <h1 class=" pb-3">About Us</h1>
        <p class="col-md-12 ">Using a series of utilities, you can create this jumbotron, just like the one in previous 
          versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.Using a 
          series of utilities, you can create this jumbotron,
           just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and  restyle it to your liking Using 
           a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. 
           Check out the examples below for how you can remix and restyle it to your liking.Using a series of utilities,
            you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below
             for how you can remix and restyle it to your liking. Using a series of utilities, you can create this jumbotron, 
             just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle
              it to your liking. Using a series of utilities, you can create this jumbotron, just like the one in previous
               versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <button class="btn btn-warning " type="button">Read More</button>



        
      </div>
      


      <!-- //////// -->
      <div class="row featurette mt-5 ">
      <div class="col-md-8 order-md-2 ">
        <h2 class="featurette-heading " >Khalil Ahmed Panhwar. <span class="text-muted">CEO 63-Bloggers .</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        <h5 class="" >My Social Accounts.</h5>
        <div>
        
        <ul class="nav col-md-4  d-flex">
    
      <li class="ms-3"><a class="text-muted" href="#">
        <p style="font-size: 2rem; color: #3b5998;"><i class="fa fa-facebook"></i></p>
      </a></li>
      <li class="ms-3"><a class="text-muted" href="#">
        <p style="font-size: 2rem; color: #00acee;"><i class="fa fa-twitter"></i></p>
      </a></li> 
      <li class="ms-3"><a class="text-muted" href="#">
        <p style="font-size: 2rem; color: #C13584;"><i class="fa fa-instagram"></i></p>
      </a></li>
      <li class="ms-3"><a class="text-muted" href="#">
        <p style="font-size: 2rem; color: #0072b1;"><i class="fa fa-linkedin"></i></p>
      </a></li>
    </ul>
        </div>
      </div>
      <div class="col-md-4 order-md-1">
        <img src="images/other-images/profile.jpg" class="rouneded" style="border-radius: 20px" alt="image" width="300" height="300">

      </div>
    </div>
      <!-- //////// -->
    </div>

   </div>
  <!-- main content section end -->




  <!-- include footer -->
<?php
    include 'include/footer.php';
?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    
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