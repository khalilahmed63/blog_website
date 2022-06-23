<?php 
session_start();
require_once 'required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
     
      $query = "SELECT * FROM POST WHERE post_status = 'InActive'";

      $result = mysqli_query($connection, $query) ;


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



    <title>Pending posts</title>
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


<!-- pending post section start -->
<div class="border rounded">
    <div class="container border rounded my-4 p-4 col-md-12">
    <p id="message" class="text-success fw-bold"></p>
      <h2 class="p-3">Inactive Posts</h2>
        <div class="">
          <table id="example" class="table table-striped" style="width:100%">

          <thead>
            <tr>
                <th>#</th>
                <th>Blog Title</th>
                <th>Summary</th>
                <th>date/Time</th>
                <th>Actions</th>
            </tr>
        </thead>
          <tbody id="content-table">
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Blog Title</th>
                <th>Summary</th>
                <th>date/Time</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>

<!-- pending post section end -->




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



    <script type="text/javascript">
      
      function show_inactive_posts(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/show-inactive-posts.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("content-table").innerHTML = this.responseText;
          
          }
        }
      }
    </script>
      <script type="text/javascript">
        show_inactive_posts();
    </script>   



<script type="text/javascript">
      
      function active_post(post_id){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/active-post.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("post_id="+post_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_inactive_posts();
          
          }
        }
      }
    </script>

<script type="text/javascript">
      
      function delete_post(post_id){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/delete-post.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("post_id="+post_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_inactive_posts();
          
          }
        }
      }
    </script>

  </body>
</html>