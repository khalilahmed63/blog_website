  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $active_blog_query = "SELECT * FROM blog WHERE blog_status = 'Active'";

      $active_blog_result = mysqli_query($connection, $active_blog_query) ;

?>
      				
              <?php
           if ($active_blog_result->num_rows) {
             $no = 0;
             while ($active_blog_row = mysqli_fetch_assoc($active_blog_result)) {
               $no++;
               echo "<tr>
               <td>".$no."</td>
               <td>".$active_blog_row['blog_id']."</td>
               <td>".$active_blog_row['blog_title']."</td>
               <td style='display: none'>".$active_blog_row['blog_status']."</td>
               <td>".$active_blog_row['created_at']."</td>
               <td style='display: none'>".$active_blog_row['updated_at']."</td>
               <td>
                   <button  onclick='view_blog(".$active_blog_row['blog_id'].")' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' class='btn btn-warning btn-sm'>View</button>
                   <button onclick='inactive_blog(".$active_blog_row['blog_id'].")' type='button' class='btn btn-primary btn-sm'>InActive</button>
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_blog(".$active_blog_row['blog_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>There is no Active Blogs</h2></td>"; 
           }
           ?>  
   
      