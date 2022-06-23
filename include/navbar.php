
 <?php 
  require_once 'required/connection.php';

  $category_query = "SELECT * FROM category";  
  $category_result = mysqli_query($connection, $category_query);

  $blog_query = "SELECT * FROM blog";  
  $blog_result = mysqli_query($connection, $blog_query);

 
  
 ?> 
<!-- navbar start -->
  <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">63 Bloggers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
        aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse show" id="main_nav" style="">


        <ul class="navbar-nav ms-auto mt-2">
          <li class="nav-item"><a class="nav-link text-white" href="index.php"> Home </a></li>
          <li class="nav-item"><a class="nav-link text-white" href="about.php"> About Us </a></li>
          <li class="nav-item"><a class="nav-link text-white" href="contact-us.php"> Contact Us </a></li>
          <li class="nav-item">

            <div class="dropdown">
              <p class="nav-link text-white  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Blogs
              </p>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <?php
                if ($blog_result->num_rows) {
                  while($blog_row = mysqli_fetch_assoc($blog_result)){
                    
                    echo "<li><a class='dropdown-item' href='myblog.php?blog_id=".$blog_row['blog_id']."'>".$blog_row['blog_title']."</a></li>";
                  }
                }
                else{
                  echo "<li><a class='dropdown-item' href='#'>No Blogs</a></li>";
                }
                
                ?>
                
                
              </ul>
            </div>

          </li>

          <li class="nav-item">

          <div class="dropdown">
            <p class="nav-link text-white  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
            </p>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php
                          if ($category_result->num_rows) {
                            while($category_row = mysqli_fetch_assoc($category_result)){
                              
                              echo "<li><a class='dropdown-item' href='blog-categories.php?category_id=".$category_row['category_id']."'>".$category_row['category_title']."</a></li>";
                            }
                          }
                          else{
                            echo "<li><a class='dropdown-item' href='#'>No Categories</a></li>";
                          }
                          
                          ?>
            </ul>
          </div>

          </li>
          <li class="nav-item"><a class="nav-link text-white" href="send-feedback.php"> feedback </a></li>

          <?php

            if (isset($_SESSION['user'])) {
            
              if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1) {
                ?>
                <li class="nav-item"><a class="nav-link text-white fw-bold" href="admin-home.php"> Dashboard </a></li>
                   
                <?php
              }
              
              ?>
              <li class="nav-item"><a class="nav-link btn-warning text-dark rounded mx-1 px-3 py-1 mt-1" href="php-files/logout.php"> Log-out </a></li>
              <li class="nav-item"></li>
               <li class="nav-item"><a class="nav-link  mx-1 py-1 mt-1 text-white fw-bold" href="profile.php"> 
                
                  <?php

                    echo ($_SESSION['user']['first_name']);?>
                     </a></li>
                   <li class="nav-item">                  
                    <img class="d-flex rounded-circle text-white" src="images/profile-images/<?php echo $_SESSION['user']['user_image'] ;?>" alt="Image" height='60px'>
                 
                   </li>
              <?php
            }
          
            else{
              ?>
              <li class="nav-item"><a class="nav-link btn-warning text-dark rounded mx-1 px-3 py-1 mt-1 " href="login.php"> Login </a></li>
          <li class="nav-item"><a class="nav-link btn-warning text-dark rounded mx-1 px-3 py-1 mt-1" href="Register.php"> SignUp </a></li>
            <?php
            }

          ?>
          
          
         
        
        </ul>

      </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
  </nav>
  <!-- navbar end -->