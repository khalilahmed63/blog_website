
 <!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-warning">
                        <i class="fa fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ">
                          <?php

                                     if (isset($_SESSION['user'])) {
                                       ?>
                                       <li class="nav-item mt-2"><a class="nav-link btn-warning text-dark rounded mx-1 px-3 py-1 mt-1" href="php-files/logout.php"> Log-out </a></li>
                                        <li class="nav-item mt-2  "><a class="nav-link  mx-1 py-1 mt-1 fw-bold" href="profile.php"> 
                                           <?php

                                             echo ($_SESSION['user']['first_name']);?></a></li><li class="nav-item">
                                            <img class="d-flex rounded-circle " src="images/profile-images/<?php echo $_SESSION['user']['user_image'] ;?>" alt="Image"  height='50px' ></li>
                                            
                                       <?php
                                     }
        
                                       ?>
                        </ul>
                    </div>
                </div>
            </nav>

 <!-- navbar end -->