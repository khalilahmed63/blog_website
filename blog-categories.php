<?php 
session_start();
require_once 'required/connection.php';


  $category_query2 = "SELECT * FROM category";  
  $category_result2 = mysqli_query($connection, $category_query2);

  $category_id = $_REQUEST['category_id'];

  $category_query3 = "SELECT * FROM category WHERE category_id = $category_id";  
  $category_result3 = mysqli_query($connection, $category_query3);

  $category_row3 = mysqli_fetch_assoc($category_result3);


$query = "SELECT * FROM post_category where category_id = '".$_REQUEST['category_id']."' ";

$result = mysqli_query($connection, $query) ;



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- fontawesome icon link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="style.css">

      <style>
    *{
      
      box-sizing: border-box;
    }
    a{
      text-decoration: none;
      color: black;
    }

    .blog_card{
      transition: all 0.3s ease-in-out;
    }
    .blog_card:hover{
      transform: scale(1.1);
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
  </style>
  <title>Catagories</title>
  
</head>

<body>

  <!-- include navbar -->
<?php
    include 'include/navbar.php';
?>



  



 <!-- search blogs section start -->
        <div class=" " style="background-color: white;">
          <div class="container px-4 pt-5 " id="featured-3">
            <div class="d-flex justify-content-between border-bottom">
              
            <h2 class="pb-2 ">Categories</h2>
            <h2 class="pb-2 "><?php echo $category_row3['category_title'] ?></h2>
            </div>
            <!-- first row start -->

            <div class="row g-5 py-5 row-cols-1 row-cols-lg-3">

<?php
            if($result->num_rows){
              while($row = mysqli_fetch_assoc($result)){
                // print_r($row['post_id']);

                $query2 = "Select * from post where post_id = '".$row['post_id']."'";
                $result2 = mysqli_query($connection, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                // print_r($row2);
                  echo " 
                  <a href='post-detail.php?post_id=".$row2['post_id']."'  class='feature col '>
                  <div class='blog_card m-3 p-3 rounded border'>
                  <div class=''>
                    <img
                      src='images/blog-images/".$row2['featured_image']."'
                      class='card-img-top img-fluid' alt='image' height='270px' style='max-height: 230px!important;'>
                  </div>
                  <h3>".$row2['post_title']."</h3>
                  <p>".$row2['post_summary']."...</p>
                  <div class='d-flex justify-content-between'>
                    <p class='card-text'><b>Khalil</b></p>
                    <p class='card-text'><small class='text-muted'>".$row2['updated_at']."</small></p>
                  </div>
                  </div>
                  </a>";

              }  
  
            }
            else {

              echo "<h2 class='text-center'>No Post In this Category</h2>";
            }?>
              

              <!-- placeholder card -->
              <div class="feature col">
                <div class="blog_card m-3 p-3 rounded border">
                  <img
                    src="https://images.unsplash.com/photo-1606770347238-77fcfd29906c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    class="card-img-top img-fluid" alt="..." height="270px" style="max-height: 230px!important;">
                
                <h5 class="card-title placeholder-glow">
                      <span class="placeholder col-6 my-2"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                      <span class="placeholder col-7 "></span>
                      <span class="placeholder col-4"></span>
                      <span class="placeholder col-4"></span>
                      <span class="placeholder col-6"></span>
                      <span class="placeholder col-8"></span>
                      <div class="d-flex justify-content-between">
                  <span class="placeholder col-3 mt-2"></span><span class="placeholder col-4 mt-2"></span>
                  </div>
                </div>
                    </p>

              </div>
              <!-- placeholder card -->
            </div>

          
          </div>
        </div>
        <!-- search blogs section end -->


 


<!-- include footer -->
<?php
    include 'include/footer.php';
?>






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