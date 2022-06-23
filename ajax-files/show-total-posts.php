  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM post";

      $result = mysqli_query($connection, $query) ;



?>
      				
              <?php
           if ($result->num_rows) {
             $no = 0;
             while ($row = mysqli_fetch_assoc($result)) {
               $no++;
               echo "<tr id='post_record_".$row['post_id']."'>
               <td>".$no."</td>
               <td>".$row['post_id']."</td>
               <td>".$row['post_title']."</td>
               <td style='display: none'>".$row['post_summary']."</td>
               <td style='display: none'>".$row['post_description']."</td>
               <td style='display: none'>".$row['featured_image']."</td>
               <td style='display: none'>".$row['post_status']."</td>
               <td style='display: none'>".$row['is_comment_allowed']."</td>
               <td>".$row['created_at']."</td>
               <td style='display: none'>".$row['updated_at']."</td>
               <td>
                   <button  onclick='view_post(".$row['post_id'].")' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' class='btn btn-warning btn-sm'>View</button>
                   ";
                   if($row['post_status'] == 'Active'){
                    echo "
                    <button  type='button' class='btn btn-primary btn-sm' onclick='inactive_post(".$row['post_id'].")'>InActive</button>";
                   }
                   else{
                      echo 
                      "<button  type='button' class='btn btn-success btn-sm' onclick='active_post(".$row['post_id'].")'>Active</button>";
                   }
                  echo " 
                   <button  type=button' class='btn btn-success btn-sm' onclick='edit_post(".$row['post_id'].")'>Edit</button>
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_post(".$row['post_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>There is no Post</h2></td>"; 
           }
           ?>    