
<?php 
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


    <!-- coustom css -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">



    <title>InActive Users</title>
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
                      <p class=" p-3 first_name text-dark" id="first_name">First Name : </p>
                    </div>
                    <div class="col-md-12">
                      <p class=" p-3 last_name text-dark" id="last_name">Last Name : asdf</p>
                    </div>
                    <div class="col-md-12">
                      <p class=" p-3 email text-dark" id="email">Email : asdf</p>
                    </div>
                    <div class="col-md-12 ">
                      <p class=" p-3 gender text-dark" id="gender">Gender : asdf</p>
                    </div>
                    <div class="col-md-12 ">
                      <p class=" p-3 address text-dark" id="address">Address : asdf</p>
                    </div>
                     <div class="col-md-12 ">
                      <p class=" p-3 address text-dark" id="created_at">Created At : asdf</p>
                    </div>
                     <div class="col-md-12 ">
                      <p class=" p-3 address text-dark" id="updated_at">Created At : asdf</p>
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


<!-- pending users section start -->
<div class="border rounded">
    <div class="container border rounded my-4 p-4 col-md-12">
      <p id="message" class="text-success fw-bold"></p>
      <h2 class="p-3">InActive Users</h2>
        <div class="">
          <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <!-- <th>User Image</th> -->
                <th>User Name</th>
                <th>User Email</th>
                <th>date/Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="content-table">
           
       
          
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <!-- <th>User Image</th> -->
                <th>User Name</th>
                <th>User Email</th>
                <th>date/Time</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
</div>
<!-- pending users section end -->
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
      
      function show_inactive_user(){
        
        
       

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/show-inactive-users.php",true);
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
        show_inactive_user();
    </script>


    <script type="text/javascript">

        function show_profile(user_id){
            
            user_record = document.getElementById('user_record_'+user_id);
            var Cells = user_record.getElementsByTagName("td");


            document.getElementById('user_profile').src = 'images/profile-images/'+Cells[1].innerText;
            document.getElementById('first_name').innerText = 'First Name : '+Cells[2].innerText;
            document.getElementById('last_name').innerText = 'Last Name : '+Cells[3].innerText;
            document.getElementById('gender').innerText = 'Gender : '+Cells[4].innerText;
            document.getElementById('email').innerText = 'Email : '+Cells[5].innerText;
            document.getElementById('address').innerText = 'Address : '+Cells[6].innerText;
            document.getElementById('created_at').innerText = 'Created At : '+Cells[7].innerText;
            document.getElementById('updated_at').innerText = 'Update At : '+Cells[7].innerText;

        
        }
    </script>


    <script type="text/javascript">
      
      function approve_user(user_id){
        


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/approve_user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("message").innerHTML = this.responseText;
            show_inactive_user();
          
          }
        }
      }
    </script>


    <script type="text/javascript">
      
      function reject_user(user_id){
        


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/reject-user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("message").innerHTML = this.responseText;
            show_inactive_user();
          
          }
        }
      }
    </script>

     <script type="text/javascript">
      
      function active_user(user_id){
        


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/active-user.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("user_id="+user_id);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("message").innerHTML = this.responseText;
            show_inactive_user();
          
          }
        }
      }
    </script>


  </body>
</html>