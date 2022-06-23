<?php 
session_start();
require_once 'required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
     
      $active_post_query = "SELECT * FROM POST ";
      $active_post_result = mysqli_query($connection, $active_post_query);

      
      
      $inactive_post_query = "SELECT * FROM POST WHERE post_status = 'InActive'";
      $inactive_post_result = mysqli_query($connection, $inactive_post_query);


      // $inactive_post_query = "SELECT * FROM POST WHERE post_status = 'InActive'";
      // $inactive_post_result = mysqli_query($connection, $inactive_post_query);


      $active_users_query = "SELECT * FROM user WHERE is_approved = 'Approved' AND is_active = 'Active'";
      $active_users_result = mysqli_query($connection, $active_users_query);
    


      $inactive_users_query = "SELECT * FROM user WHERE is_approved = 'Approved' AND is_active = 'InActive'";
      $inactive_users_result = mysqli_query($connection, $inactive_users_query);
      


      $active_comment_query = "SELECT * FROM user_post_comment WHERE is_active = 'Active'";
      $active_comment_result = mysqli_query($connection, $active_comment_query);


      $inactive_comment_query = "SELECT * FROM user_post_comment WHERE is_active = 'InActive'";
      $inactive_comment_result = mysqli_query($connection, $inactive_comment_query);







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
    <link rel="stylesheet" type="text/css" href="css/admin.css">

  <style type="text/css">
  /* Style the active class, and buttons on mouse-over */
  .active, .btn:hover {
    background-color: #666;
    color: white;
  }
   .active {
        margin-left: -250px;
    }
</style>

    <title>Total posts</title>
  </head>
  <body>

   <div class="wrapper">
       

         <!-- include Sidebar -->
        <?php
            include 'include/admin-nav.php';
        ?>

        <!-- Page Content  -->
        <div id="content">

        <!-- include navbar top -->
        <?php
            include 'include/admin-header.php';
        ?>


            <!-- main content inside start -->
    <div class="border rounded">
      <h2 class="p-3">Admin Home</h2>
    <div class="container  my-4 p-4 col-md-12">
       <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">Active Posts</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $active_post_result->num_rows ?></h1>
            <a href='active-posts.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">InActive Posts</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $inactive_post_result->num_rows ?></h1>
           
            <a href='inactive-post.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">Pending Posts</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $active_post_result->num_rows ?></h1>
            
            <a href='inactive-post.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>

    </div> <!-- end row -->
    
    <!-- ///////////////////  2nd row start ////////////////// -->
     <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">Active Users</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $active_users_result->num_rows ?></h1>
            
            <a href='active-users.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">InActive Users</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $inactive_users_result->num_rows ?></h1>
           
            <a href='inactive-users.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-dark">
          <div class="card-header py-3  border-dark">
            <h4 class="my-0 fw-normal">Pending Users</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $active_post_result->num_rows ?></h1>
            
            <a href='pending-users.php' class="w-100 btn btn-lg btn-warning">go</a>
          </div>
        </div>
      </div>



    </div> <!-- end row -->
    	
    	<!-- ///////////////////  2nd row start ////////////////// -->
    	 <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    	  <div class="col">
    	    <div class="card mb-4 rounded-3 shadow-sm border-dark">
    	      <div class="card-header py-3  border-dark">
    	        <h4 class="my-0 fw-normal">Active Comments</h4>
    	      </div>
    	      <div class="card-body">
    	        <h1 class="card-title pricing-card-title"><?= $active_comment_result->num_rows ?></h1>
    	        
    	        <a href='comments.php' class="w-100 btn btn-lg btn-warning">go</a>
    	      </div>
    	    </div>
    	  </div>
    	  <div class="col">
    	    <div class="card mb-4 rounded-3 shadow-sm border-dark">
    	      <div class="card-header py-3  border-dark">
    	        <h4 class="my-0 fw-normal">InActive Comments</h4>
    	      </div>
    	      <div class="card-body">
    	        <h1 class="card-title pricing-card-title"><?= $inactive_comment_result->num_rows ?></h1>
    	       
    	        <a href='comments.php' class="w-100 btn btn-lg btn-warning">go</a>
    	      </div>
    	    </div>
    	  </div>
    	  <div class="col">
    	    <div class="card mb-4 rounded-3 shadow-sm border-dark">
    	      <div class="card-header py-3  border-dark">
    	        <h4 class="my-0 fw-normal">Pending Comments</h4>
    	      </div>
    	      <div class="card-body">
    	        <h1 class="card-title pricing-card-title"><?= $active_comment_result->num_rows ?></h1>
    	        
    	        <a href='comments.php' class="w-100 btn btn-lg btn-warning">go</a>
    	      </div>
    	    </div>
    	  </div>
    	</div> <!-- end row -->
    </div>
           

          

        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <script type="text/javascript">
      
      document.ready(function () {
            document.getElementById("sidebarCollapse").addEventListener('click', (e) => {
                document.getElementById("sidebar").classList.toggle("active");
            });
        });
    </script>


    <script>
// Add active class to the current button (highlight it)
  var btn = getElementsById("sidebarCollapse");
  btn.addEventListener("click", function() {
  var sidebar = document.getElementsByClassName("active");
  sidebar.className = sidebar.className.replace(" active", "");
  this.className += " active";
  
}
</script>    
  </body>
</html>