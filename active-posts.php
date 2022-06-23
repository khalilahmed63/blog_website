<?php 
session_start();
require_once 'required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
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

    <!-- coustom css -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">



    <title>Active posts</title>
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


              if (isset($_REQUEST['msg'])) {
                  $msg =  $_REQUEST['msg'];
                  echo "<p class='text-center text-success fw-bold'>$msg</p>";
              }
          ?>


      


            <!-- main content inside start -->
<div class="border rounded">










  <!-- search bar section start -->
  <!-- <div class="container pt-5">
    <div class="">
    <div class="d-flex justify-content-end col-12">
       <form class="form-inline d-flex">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 300px">
        <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit">Search</button>
      </form>
    </div>
   
  </div>  
  </div> -->
  <!-- search bar section end -->





  <!-- main content start -->
    <div class="container border rounded my-4 p-4 col-md-12">
        <p id="message" class="text-success fw-bold"></p>
      <h2 class="p-3">Active posts</h2>
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
            <!-- main content inside end -->

          
















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
      
      function show_active_posts(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/show-active-posts.php",true);
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
        show_active_posts();
        // edit_post();
    </script>
   

    <script type="text/javascript">
      
      function Inactive_post(post_id){


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/inactive-post.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("post_id="+post_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_active_posts();
          
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
            show_active_posts();
          
          }
        }
      }
    </script>

<script type="text/javascript">
      
      function edit_post(post_id){
        
        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-edit-post.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("post_id="+post_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            // show_active_posts();
          
          }
        }
      }
    </script>




  </body>
</html>