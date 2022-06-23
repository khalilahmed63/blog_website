

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

    <title>See Feedback</title>
  </head>
  <body>




  
  <!-- Modal Start-->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Feedback</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <!-- profile content start -->
                  <div class="col-md-12">
                    <p class=" p-2 first_name text-dark" id="feedbackid">Feedback Id : </p>
                  </div>
                  <div class="col-md-12">
                    <p class=" p-2 last_name text-dark" id="userid">User Id : asdf</p>
                  </div>
                  <div class="col-md-12">
                    <p class=" p-2 email text-dark" id="username">User Name : asdf</p>
                  </div>
                  <div class="col-md-12 ">
                    <p class=" p-2 address text-dark" id="useremail">User Email : asdf</p>
                  </div>
                   <div class="col-md-12 ">
                    <p class=" p-2 address text-dark" id="feedback">Feedback Message : asdf</p>
                  </div>
                   <div class="col-md-12 ">
                    <p class=" p-2 address text-dark" id="created_at">Created AT : asdf</p>
                  </div>
                   <div class="col-md-12 ">
                    <p class=" p-2 address text-dark" id="updated_at">Updated At : asdf</p>
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


            
            <!-- main content start -->
              <div class="container border rounded my-4 p-4 col-md-12">
              <p id="message" class="text-success fw-bold"></p>
                <h2 class="p-3">Feedback</h2>
                  <div class="">
                  <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Feedback</th>
                          <th>date/Time</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody id="content-table">
                      
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>#</th>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Feedback</th>
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

function feedback_modal(feedback_id){
    
    feedback_record = document.getElementById('feedback_record_'+feedback_id);
    var Cells = feedback_record.getElementsByTagName("td");


    document.getElementById('feedbackid').innerText = 'Feedback Id : '+Cells[0].innerText;
    document.getElementById('userid').innerText = 'User Id : '+Cells[1].innerText;
    document.getElementById('username').innerText = 'User Name : '+Cells[2].innerText;
    document.getElementById('useremail').innerText = 'User Email : '+Cells[3].innerText;
    document.getElementById('feedback').innerText = 'Feedback : '+Cells[4].innerText;
    document.getElementById('created_at').innerText = 'Created At : '+Cells[5].innerText;
    document.getElementById('updated_at').innerText = 'Update At : '+Cells[6].innerText;

}
</script>


<script type="text/javascript">
      
      function show_feedback(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/show-feedback.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("content-table").innerHTML = this.responseText;
          
          }
        }
      }
    </script>
      <script type="text/javascript">
        show_feedback();
    </script>

 

<script type="text/javascript">
      
      function delete_feedback(feedback_id){


        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/feedback-process.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("feedback_id="+feedback_id+'&action=delete_feedback');

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_feedback();
          
          }
        }
      }
    </script>
  </body>
</html>