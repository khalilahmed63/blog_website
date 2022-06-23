<?php 
session_start();
require_once 'required/connection.php';
if (!(isset($_GET['post_id']))) {
  header('location:index.php');

}
else {
  $post_id = $_GET['post_id'];

  $query = "SELECT * FROM post where post_id = ".$post_id."";

  $comment_query = "SELECT * FROM user_post_comment where post_id = ".$post_id." AND is_active = 'Active'";

  $result = mysqli_query($connection, $query);

  $commnet_result = mysqli_query($connection, $comment_query);


  $row = mysqli_fetch_assoc($result);





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


    <!-- custom css -->
    <link rel="stylesheet" href="css/blog.css">

    
    <script>
          function form_validation(){
            var is_validate = true;

                // Input Fields Data
            var comment = document.getElementById("comment").value;
      
          
            // Input Fields Patterns
            var alphabets_pattern = /^[a-z]{3,15}$/i;
           



              if(comment == ""){
                is_validate = false;
                document.getElementById("comment_msg").innerHTML  = "Please Enter Comment First";
              }
              else{
                document.getElementById("comment_msg").innerHTML  = "";
              }




            if(is_validate){
              return true;
            }
            else{
              return false;
            }
          }
        </script>
           
          <style>
               .post_desc{
              font-size: 22px;
            }
            .post_summary{
              font-size: 28px;
              
            }
          </style>

    <title>Blog</title>
  </head>
  <body>

    <!-- include navbar -->
<?php
  include 'include/navbar.php';
?>


  <!-- crousel start -->
 <div class="">  
 <img src="<?php echo'images/blog-images/'.$row['featured_image']; ?>" class="" alt="Featured Image" width='100%' >
  </div>
  
  </div>
 </div>
  <!-- crousel end -->

 
  <!-- main content start -->
  <div class="container">
      <article class="blog-post">
     
        <h1 class="blog-post-title  pt-5" ><?= $row['post_title']; ?></h1>
        <div class='d-flex justify-content-between'>
          <p class="blog-post-meta text-success fw-bold">Posted At : <span class=' text-dark'> <?= $row['created_at']; ?></span> </p>
          <p class="blog-post-meta text-success fw-bold">Last Updated :  <span class=' text-dark'> <?= $row['updated_at']; ?></span> </p>
          
      </div>
       

        <blockquote>
          <p class='post_summary text-success'><strong><?= $row['post_summary']; ?></strong></p>
        </blockquote>
        <p class='post_desc'><?= $row['post_description']; ?></p>
       
        
      </article>
  </div>
        
  <!-- main content end -->


  <!-- comment section start -->
  
  <!-- add comment -->
  <?php
  if (isset($_SESSION['user'])) {
    ?>
      <div class="container py-2 text-dark " >
        <div class="row d-flex">
          <div class="col-md-8 col-lg-12 ">
            <div class="card g-bg-secondary"  style=" border-radius: 20px;" >
              <div class="card-body p-3">
                <div class="d-flex flex-start w-100">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="images/profile-images/<?php echo $_SESSION['user']['user_image'] ?>" alt="avatar" width="65"
                    height="65" />
                  <div class="w-100">
                    <h5>Add a comment</h5>
                    <form action="php-files/comment-process.php" method="POST" onsubmit="return form_validation()"> 
                    <input type="hidden" name="post_id" id="post_id" value="<?= $post_id  ?>">                                    
                    <div class="form-outline">
                      <textarea class="form-control" name="comment" id="comment" rows="2"></textarea>
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="textAreaExample">What is your view?</label>
                        <span id="comment_msg" class="text-danger text-right"></span>
                        <?php if(isset($_GET['faild_msg'])){echo "<span class='text-danger text-right'>".$_REQUEST['msg']."</span>"; }  ?>
                         <?php if(isset($_GET['msg'])){echo "<span class='text-success text-right'>".$_REQUEST['msg']."</span>"; }  ?>  
                      </div>
                      
                      
                    </div>
                    <div class="d-flex justify-content-end mt-1">
                      <button type="submit" id="send_comment" name="send_comment" class="btn btn-warning btn-lg ">
                        Comment 
                      </button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
}
?>

  <div class="container">
    <?php

    while ($comment_row = mysqli_fetch_assoc($commnet_result)) {

        $user_query = "SELECT * FROM user where user_id = ".$comment_row['user_id']."";
        $user_result = mysqli_query($connection, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);

       echo '<div class="row"> <!-- Comment start -->
      <div class="col-md-8" >
          <div class="media g-mb-30 media-comment">
              <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="images/profile-images/'.$user_row['user_image'].'" alt="Image">
              <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style="border-radius: 20px">
                <div class="g-mb-15">
                  <h5 class="h5 g-color-gray-dark-v1 mb-0">'.$user_row['first_name'].'</h5>
                  <span class="g-color-gray-dark-v4 g-font-size-12">'.$comment_row['created_at'].'</span>
                </div>
          
                <p>'.$comment_row['comment'].'</p>
          
                <ul class="list-inline d-sm-flex my-0">
                  <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="" style="text-decoration: none">
                      <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                      178
                    </a>
                  </li>
                  <li class="list-inline-item g-mr-20">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="" style="text-decoration: none">
                      <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                      34
                    </a>
                  </li>
                </ul>
              </div>
          </div>
      </div>
  
  </div> <!-- Comment end -->';
    }

    ?>
  



  </div>
  <!-- comment section end -->





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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>