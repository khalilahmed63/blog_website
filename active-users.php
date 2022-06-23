<?php 
session_start();
require_once 'required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM user WHERE is_active = 'Active'";

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

      <!-- coustom css -->
      <link rel="stylesheet" type="text/css" href="css/profile.css">



    <title>Active Users</title>
  </head>
  <body>


  <!-- Modal Start-->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <!-- profile content start -->
                  <div class="text-center bg-warning"><img src="" id="user_profile" alt='User Image' class="rounded-circle p-3" width="200px" height="200px"> </div>

                  <div class="col-md-12">
                    <p class=" p-2  ">First Name : <span  id="first_name" class='text-dark first_name'></span> </p>
                  </div>
                  <div class="col-md-12">
                    <p class=" p-2  " id="">Last Name : <span  id="last_name" class='text-dark last_name'></span></p>
                  </div>
                  <div class="col-md-12">
                    <p class=" p-2  " id="">Email : <span  id="email" class='text-dark email'></span></p>
                  </div>
                  <div class="col-md-12 ">
                    <p class=" p-2  " id="">Gender : <span  id="gender" class='text-dark gender'></span></p>
                  </div>
                  <div class="col-md-12 ">
                    <p class=" p-2  " id="">Address : <span  id="address" class='text-dark address'></span></p>
                  </div>
                   <div class="col-md-12 ">
                    <p class=" p-2  " id="">Created At : <span  id="created_at" class='text-dark created_at'></span></p>
                  </div>
                   <div class="col-md-12 ">
                    <p class=" p-2  " id="">Created At : <span  id="updated_at" class='text-dark updated_at'></span></p>
                  </div>
                  
              <!-- profile content end -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->


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






<!-- total users section start -->
<div class="border rounded">






  <!-- search bar section start -->
  <div class="container pt-5">
    <div class="">
    <div class="d-flex justify-content-end col-12">
       <form class="form-inline d-flex">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 300px">
        <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit">Search</button>
      </form>
    </div>
   
  </div>  
  </div>
  <!-- search bar section end -->





     <div class="container border rounded my-4 p-4 col-md-12">

        <p id="message" class="text-success fw-bold"></p>
      <h2 class="p-3">Active Users</h2>
        <div class="">
          <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
       <tbody id="content-table">
                
           
              
             </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
<!-- total users section end -->




        </div>
    </div>


  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script type="text/javascript">

        function show_profile(user_id){
            
            user_record = document.getElementById('user_record_'+user_id);
            var Cells = user_record.getElementsByTagName("td");


            document.getElementById('user_profile').src = 'images/profile-images/'+Cells[1].innerText;
            document.getElementById('first_name').innerText = Cells[2].innerText;
            document.getElementById('last_name').innerText = Cells[3].innerText;
            document.getElementById('gender').innerText = Cells[4].innerText;
            document.getElementById('email').innerText = Cells[5].innerText;
            document.getElementById('address').innerText = Cells[6].innerText;
            document.getElementById('created_at').innerText = Cells[7].innerText;
            document.getElementById('updated_at').innerText = Cells[7].innerText;
        
        }
    </script>


    <script type="text/javascript">
      
      document.ready(function () {
            document.getElementById("sidebarCollapse").addEventListener('click', (e) => {
                document.getElementById("sidebar").classList.toggle("active");
            });
        });
    </script> 


    <script type="text/javascript">
      
      function show_active_user(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/show-active-users.php",true);
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
        show_active_user();
    </script>


    <script type="text/javascript">
      
      function Inactive_user(user_id){
        
        btn_id = 'inactive_user_'+user_id;
       


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/inactive-user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_active_user();
          
          }
        }
      }
    </script>

    <script type="text/javascript">
      
      function delete_user(user_id){
        
        btn_id = 'inactive_user_'+user_id;
       


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/delete-user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_active_user();
          
          }
        }
      }
    </script>


<script type="text/javascript">
      
      function edit_user(user_id){
        
        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-edit-user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            // show_active_posts();
          
          }
        }
      }
    </script>

<script type="text/javascript">
    
    var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

  </script>

    
   
  </body>
</html>