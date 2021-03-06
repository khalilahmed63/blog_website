<?php 
 session_start();


require_once 'required/connection.php';

	$q="SELECT COUNT(*) AS 'Total' FROM `post`";
  $r = mysqli_query($connection,$q);
  $f = mysqli_fetch_assoc($r);

  $per_page = 6;
  $total_links = ceil($f['Total']/$per_page);

  if(isset($_REQUEST['page']))
  {
    $start = $_REQUEST['page'] * $per_page;
  }else
  {
     $_REQUEST['page'] = 0;
     $start = 0;
  }



$query = "SELECT * FROM POST WHERE post_status = 'Active' AND blog_id = ".$_REQUEST['blog_id']." ORDER BY post_id DESC LIMIT ".$start.",".$per_page." ";

$result = mysqli_query($connection, $query) ;

// print_r($result);

$query2 = "SELECT * FROM POST WHERE post_status = 'Active'  ORDER BY post_id DESC LIMIT 0,4";

$result2 = mysqli_query($connection, $query2) ;

$query3 = "SELECT * FROM BLOG WHERE blog_id = ".$_REQUEST['blog_id']."";

$result3 = mysqli_query($connection, $query3) ;

$row3 = mysqli_fetch_assoc($result3);

// echo $row3['blog_background_image'];

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
    <link rel="stylesheet" href="css/style.css">

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

  
    .top-section{
       background: url(images/blog-bg-images/<?php echo $row3['blog_background_image'] ?>) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;

    }
  </style>

  <title>63 Bloggers</title>
  
</head>

<body>

  <!-- include navbar -->
<?php
    include 'include/navbar.php';
?>

<!-- /// -->
<div class="top-section position-relative overflow-hidden p-1 p-md-2 text-center " style="background-color: rgb(191,191,191,0.8); height: 300px;">
    <div class="col-md-5 p-lg-2 mx-auto mt-5 ">
      <h1 class="display-4 fw-normal text-white pt-5"><?php echo $row3['blog_title'] ?></h1>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
<!-- /// -->




  <!-- main content start -->
  <div  class='main-content' >
  <div class="container" >
    <div class="row ">
     
      <div class="col-sm-12 col-md-6 col-lg-8">
        <!-- recent blogs section start -->
        <div class=" shadow-sm" >
          <div class="container px-4 pt-5 " id="featured-3">
            <h2 class="pb-2 border-bottom "><?php echo $row3['blog_title'] ?> Posts</h2>
            <!-- first row start -->
            <div class="row g-2 py-3 row-cols-1 row-cols-lg-2">
              <?php
            if ($result->num_rows) {
                $no = 0;
                // for ($i=0; $i < $result->num_rows; $i++) { 
                  
                // }
                while ($row = mysqli_fetch_assoc($result)) {
                  $no++;
                  echo " 
                  <a href='post-detail.php?post_id=".$row['post_id']."'  class='feature col '>
                  <div class='blog_card m-3 p-3 rounded border' >
                  <div class=''>
                    <img
                      src='images/blog-images/".$row['featured_image']."'
                      class='card-img-top img-fluid' alt='image' height='270px' style='max-height: 230px!important;'>
                  </div>
                  <h3 class=''>".$row['post_title']."</h3>
                  <p class=''>".$row['post_summary']."...</p>
                  <div class='d-flex justify-content-between'>
                    <p class='card-text '><small class=''>".$row['updated_at']."</small></p>
                  </div>
                  </div>
                  </a>";
                  
                }
              }
              else{
                echo "<td>There is no Record</td>"; 
              }
            ?>
            </div>

            <div class='text-center p-4' >
            <nav aria-label="Page navigation example " >
  <ul class="pagination justify-content-center">
              <?php
              
  if($_REQUEST['page'] >= 1)
  {
    ?>
     <li class="page-item ">
      <a class="page-link" href="index.php?page=<?php echo $_REQUEST['page']-1; ?>" tabindex="-1">Previous</a>
    </li>
    
    <?php
  }

  for ($i=1; $i<$total_links; $i++) { 
  
      if($i == $_REQUEST['page'])
      {
        ?>
         <li class="page-item active">
      <a class="page-link" href="myblog.php?page=<?php echo $i; ?>"><?php echo $i; ?> <span class="sr-only">(current)</span></a>
    </li>
        
        <?php
      }else{
        ?>
         <li class="page-item"><a class="page-link" href="myblog.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a></li>
     
        <?php
      }

    
  }

  if($_REQUEST['page'] != $total_links-1)
  {
    ?>
      <li class="page-item">
      <a class="page-link" href="myblog.php?page=<?php echo $_REQUEST['page'] + 1; ?>">Next</a>
    </li>
    
    <?php
  }

              ?>
               </ul>
</nav>
            </div>

         
           
          </div>
        </div>
        <!-- recent blogs section end -->
      </div> <!-- Recent Post End -->


       <div class="col-sm-12 col-md-6 col-lg-4 px-4 pt-5 "> 
        <!-- featured Post start -->
        <h2 class="pb-2 border-bottom  ">Recent posts</h2>
        
        <div class="col ">

        <?php
            if ($result2->num_rows) {
                $no = 0;
                // for ($i=0; $i < $result->num_rows; $i++) { 
                  
                // }
                while ($row2 = mysqli_fetch_assoc($result2)) {
                  $no++;
                  echo " 
                  <a href='post-detail.php?post_id=".$row2['post_id']."'  class='feature col '>
                  <div class='blog_card m-3 p-3 rounded border' >
                  <div class=''>
                    <img
                      src='images/blog-images/".$row2['featured_image']."'
                      class='card-img-top img-fluid' alt='image' height='270px' style='max-height: 230px!important;'>
                  </div>
                  <h3 class=''>".$row2['post_title']."</h3>
                  <p class=''>".$row2['post_summary']."...</p>
                  <div class='d-flex justify-content-between'>
                    <p class='card-text'><small class=''>".$row2['updated_at']."</small></p>
                  </div>
                  </div>
                  </a>";
                  
                }
              }
              else{
                echo "<td>There is no Record</td>"; 
              }
            ?>
        
       
        </div>
        <!-- featured Post end -->
      </div>



    </div>
  </div>
  </div>
  <!-- main content end -->




  <!-- bg devider -->
  <div class="b-example-divider m-5"></div>
  <!-- bg devider -->








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


<!-- navbar scroll effect  -->
 <script  src="js/navbar.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>