<?php 
session_start();
require_once 'required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
    



?>
   

<?php 

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


    

*{
	list-style: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}



.tabs ul{
	display: flex;
	justify-content: center;
	margin-bottom: 25px;
}

.tabs ul li{
	padding: 15px 15px;
	text-align: center;
	color: #3b3b3b;
	font-size: 15px;
	font-weight: 400;
	cursor: pointer;
	transition: all 0.2s ease;
	position: relative;
	border-bottom: 1px solid rgb(199, 199, 199);
}

.tabs ul li:last-child{
	border-right: 0px;
}

.tabs ul li:before{
	content: "";
	position: absolute;
	bottom: -1px;
	left: 0;
	width: 100%;
	height: 2px;
	background: hsl(0, 94%, 66%);
	opacity: 0;
	transition: all 0.2s ease;
}

.tabs ul li:hover{
	color: hsl(0, 94%, 66%);
}

/* .tabs ul li:hover:before, */
.tabs ul li.active_tab:before{
	opacity: 1;
}

.tabs ul li.active_tab{
	color: black;
}

.content{
	background: #fbfbfb;
	border-radius: 5px;
	padding: 20px;
}

.tab_wrap .title{
	font-size: 20px;
	margin-bottom: 15px;
	font-weight: 600;
}

.tab_wrap .tab_content p{
	font-size: 14px;
	line-height: 22px;
	margin-bottom: 10px;
}
</style>

    <title>Total posts</title>
  </head>
  <body>


  
  <!-- Modal Start-->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <!-- profile content start -->
                <div class="text-center bg-warning"><img src="" id="blog_background_image" alt='User Image' class="" width="100%" height="200px"> </div>
               
                  <div class="col-md-12">
                    <p class=" p-2  ">Blog Id : <span  id="blog_id" class='text-dark '></span> </p>
                  </div>
                  <div class="col-md-12">
                    <p class=" p-2  " id="">Blog Title : <span  id="blog_title" class='text-dark '></span></p>
                  </div>
                   <div class="col-md-12">
                    <p class=" p-2  " id="">Post Per Page : <span  id="ppp" class='text-dark '></span></p>
                  </div>
                  <div class="col-md-12 ">
                    <p class=" p-2  " id="">Status : <span  id="blog_status" class='text-dark '></span></p>
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


            <!-- main content inside start -->
    <div class="border rounded">
      <h2 class="p-3">Blogs</h2>
      
      <p id="message" class="text-success text-center fw-bold">
        <?php if(isset($_REQUEST['message'])){
          echo $_REQUEST['message'];
        }
        
        ?></p>
      
	<div class="tabs">
		<ul>
			<li class="active_tab">
				
				<span class="text">Total Blogs</span>
			</li>
            <li>
				
				<span class="text">Add Blog</span>
			</li>
			<li>
				
				<span class="text">Active Blogs</span>
			</li>
			<li>
				
				<span class="text">In-Active Blogs</span>
			</li>
		
		</ul>
	</div>

	<div class="content">
    <div class="tab_wrap" style="display: block;">
			<div class="tab_content">
            <div class="container border rounded my-4 p-4 col-md-12">

<p id="message" class="text-success fw-bold"></p>
<h2 class="p-3">Total Blogs</h2>

  <table id="example" class="table table-striped" style="width:100%">
<thead>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody id="show_total_Blogs">
  
      
</tbody>
<tfoot>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</tfoot>
</table><!-- total Category section end -->
</div>
</div>
</div>
</div>
		<div class="tab_wrap" style="display: none;">
			<div class="tab_content" id='show_add_blog'>
				
    
			</div>
		</div>
		<div class="tab_wrap" style="display: none;">
			<div class="tab_content">
			<!-- /////	 -->
            <div class="tab_content">
            <div class="container border rounded my-4 p-4 col-md-12">

<p id="message" class="text-success fw-bold"></p>
<h2 class="p-3">Active Blogs</h2>

  <table id="example" class="table table-striped" style="width:100%">
<thead>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody id='show_active_Blogs'>
        				

     </tbody>
<tfoot>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</tfoot>
</table><!-- total Category section end -->
</div>
</div>
			<!-- /////	 -->


			</div>
		</div>
		<div class="tab_wrap" style="display: none;">
			<div class="tab_content">
            <div class="tab_content">
            <div class="container border rounded my-4 p-4 col-md-12">

<p id="message" class="text-success fw-bold"></p>
<h2 class="p-3">In-Active Blogs</h2>

  <table id="example" class="table table-striped" style="width:100%">
<thead>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody id='show_inactive_blogs'>
        				
     </tbody>
<tfoot>
    <tr>
        <th>#</th>
        <th>Blog Id</th>
        <th>Blog Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</tfoot>
</table><!-- total Category section end -->
</div>
</div>
			</div>
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
        var tabs = document.querySelectorAll(".tabs ul li");
        var tab_wraps = document.querySelectorAll(".tab_wrap");

tabs.forEach(function(tab, tab_index){
	tab.addEventListener("click", function(){
		tabs.forEach(function(tab){
			tab.classList.remove("active_tab");
		})
		tab.classList.add("active_tab");

		tab_wraps.forEach(function(content, content_index){
			if(content_index == tab_index){
				content.style.display = "block";
			}
			else{
				content.style.display = "none";
			}
		})

	})
})
    </script>


<script type="text/javascript">
      
      function show_total_blogs(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-total-blogs.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){

            document.getElementById("show_total_Blogs").innerHTML = this.responseText;
          
          }
        }
      }
    </script>
      <script type="text/javascript">
        show_total_blogs();
    </script>


<script type="text/javascript">
      
      function show_add_blog(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-add-blog.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){

            document.getElementById("show_add_blog").innerHTML = this.responseText;
          
          }
        }
      }


      function show_active_blogs(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-active-blogs.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){

            document.getElementById("show_active_Blogs").innerHTML = this.responseText;
          
          }
        }
      }

       function show_inactive_blogs(){

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/show-inactive-blogs.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send();

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){

            document.getElementById("show_inactive_blogs").innerHTML = this.responseText;
          
          }
        }
      }
    </script>
      <script type="text/javascript">
        show_add_blog();
        show_active_blogs();
        show_inactive_blogs();
    </script>

<script type="text/javascript">
      
      function add_blog(){
        title = document.getElementById("add_blog_title").value;
        ppp = document.getElementById("ppp").value;
        image = document.getElementById("ppp").value;
        // alert(title+desc);

        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","ajax-files/add-category.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("action=add_blog&title="+title+"&ppp="+ppp);

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){

            document.getElementById("message").innerHTML = this.responseText;
            show_total_categories();


            document.getElementById("add_category_title").value = '';
            document.getElementById("add_category_desc").value = '';

          }
        }
      }
    </script>

<script type="text/javascript">

function view_blog(blog_id){
    
    blog_record_ = document.getElementById('blog_record_'+blog_id);
    var Cells = blog_record_.getElementsByTagName("td");


    document.getElementById('blog_background_image').src = 'images/blog-images/'+Cells[4].innerText;
    document.getElementById('blog_id').innerText = Cells[1].innerText;
    document.getElementById('blog_title').innerText = Cells[2].innerText;
    document.getElementById('ppp').innerText = Cells[3].innerText;
    document.getElementById('blog_status').innerText = Cells[5].innerText;
    document.getElementById('created_at').innerText = Cells[6].innerText;
    document.getElementById('updated_at').innerText = Cells[7].innerText;

}
</script>



<script type="text/javascript">
      
      function inactive_blog(blog_id){
        
        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/blog-process.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("blog_id="+blog_id+"&action=inactive_blog");

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_total_blogs();
            show_active_blogs();
            show_inactive_blogs();
          
          }
        }
      }
    </script>

<script type="text/javascript">
      
      function delete_blog(blog_id){
        
        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/blog-process.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("blog_id="+blog_id+"&action=delete_blog");

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // alert(this.responseText);
            document.getElementById("message").innerHTML = this.responseText;
            show_total_blogs();
            show_active_blogs();
            show_inactive_blogs();
          
          }
        }
      }
    </script>

  

      
<script type="text/javascript">
      
      function active_blog(blog_id){
        
        var ajax_request = null;
        if(window.XMLHttpRequest){
          ajax_request = new XMLHttpRequest();
        }
        else{
          ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax_request.open("POST","php-files/blog-process.php",true);
        ajax_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
        ajax_request.send("blog_id="+blog_id+"&action=active_blog");

        ajax_request.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            document.getElementById("message").innerHTML = this.responseText;
            show_total_blogs();
            show_active_blogs();
            show_inactive_blogs();
          }
        }
      }
    </script>
  </body>
</html>