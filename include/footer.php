<?php

require_once 'required/connection.php';

  $category_query = "SELECT * FROM category";  
  $category_result = mysqli_query($connection, $category_query);

  $blog_query = "SELECT * FROM blog";  
  $blog_result = mysqli_query($connection, $blog_query);

?>

<!-- footer start -->

<div class="container">
  <hr class='my-3'>
  <footer class="py-3 ">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Quick Links</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-muted">About</a></li>
          <li class="nav-item mb-2"><a href="contact-us.php" class="nav-link p-0 text-muted">Contact Us</a></li>
          <li class="nav-item mb-2"><a href="send-feedback.php" class="nav-link p-0 text-muted">Feedback</a></li>
          <?php if (isset($_SESSION['user'])) {

            echo '
            <li class="nav-item mb-2"><a href="php-files/download-record.php" class="nav-link p-0 text-muted">Download pdf</a></li>
            ';
          }
          ?>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Blogs</h5>
        <ul class="nav flex-column">
          <?php
                if ($blog_result->num_rows) {
                  while($blog_row = mysqli_fetch_assoc($blog_result)){
                    
                    echo "<li class='nav-item mb-2'> <a class='nav-link p-0 text-muted' href='myblog.php?blog_id=".$blog_row['blog_id']."'>".$blog_row['blog_title']."</a></li>";
                  }
                }
                else{
                  echo "<li class='nav-item mb-2'><a class='nav-link p-0 text-muted' href='#'>No Blogs</a></li>";
                }
                
                ?>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Categories</h5>
        <ul class="nav flex-column">
          <?php
                if ($category_result->num_rows) {
                  while($category_row = mysqli_fetch_assoc($category_result)){
                    
                    echo "<li class='nav-item mb-2'><a class='nav-link p-0 text-muted' href='blog-categories.php?category_id=".$category_row['category_id']."'>".$category_row['category_title']."</a></li>";
                  }
                }
                else{
                  echo "<li class='nav-item mb-2'><a class='nav-link p-0 text-muted' href='#'>No Categories</a></li>";
                }
                
                ?>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form action="php-files/subscribe-process.php" method='POST'>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-warning btn-lg" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>© 2022 - 2023 <b>63-Bloggers, Inc</b> All rights reserved.</p>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://web.facebook.com/khalil.ahmedp63/">
        <p style="font-size: 2rem; color: #3b5998;"><i class="fa fa-facebook"></i></p>
      </a></li>
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/khalilahmedpan5">
        <p style="font-size: 2rem; color: #00acee;"><i class="fa fa-twitter"></i></p>
      </a></li> 
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/khalil_ahmed_panhwar/">
        <p style="font-size: 2rem; color: #C13584;"><i class="fa fa-instagram"></i></p>
      </a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/khalil-ahmed-308a061a6/">
        <p style="font-size: 2rem; color: #0072b1;"><i class="fa fa-linkedin"></i></p>
      </a></li>
    </ul>
    </div>
  </footer>
</div>
<!-- /////////// -->




  <!-- footer end -->