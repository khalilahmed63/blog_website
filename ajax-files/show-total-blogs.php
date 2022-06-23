  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM blog";

      $result = mysqli_query($connection, $query) ;



?>
      				
              <?php
           if ($result->num_rows) {
             $no = 0;
             while ($row = mysqli_fetch_assoc($result)) {
               $no++;
               echo "<tr id='blog_record_".$row['blog_id']."'>
               <td>".$no."</td>
               <td>".$row['blog_id']."</td>
               <td>".$row['blog_title']."</td>
               <td style='display: none'>".$row['post_per_page']."</td>
               <td style='display: none'>".$row['blog_background_image']."</td>
               <td style='display: none'>".$row['blog_status']."</td>
               <td>".$row['created_at']."</td>
               <td style='display: none'>".$row['updated_at']."</td>
               <td>
                   <button  onclick='view_blog(".$row['blog_id'].")' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' class='btn btn-warning btn-sm'>View</button>
                   ";
                   if($row['blog_status'] == 'Active'){
                    echo "
                    <button  type='button' class='btn btn-primary btn-sm' onclick='inactive_blog(".$row['blog_id'].")'>InActive</button>";
                   }
                   else{
                      echo 
                      "<button  type='button' class='btn btn-success btn-sm' onclick='active_blog(".$row['blog_id'].")'>Active</button>";
                   }
                  echo " 
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_category(".$row['blog_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>There is no Blogs</h2></td>"; 
           }
           ?>    