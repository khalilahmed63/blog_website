  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM user_post_comment";

      $result = mysqli_query($connection, $query) ;



?>

<?php
           if ($result->num_rows) {
             $no = 0;
             while ($row = mysqli_fetch_assoc($result)) {
               $no++;
               echo "<tr>
               <td>".$no."</td>
               <td>".$row['user_id']."</td>
               <td>".$row['post_id']."</td>
               <td>".$row['comment']."</td>
               <td>".$row['created_at']."</td>
               <td>";
               if($row['is_active'] === 'Active'){
                 echo" <td>
                    <a href='post-detail.php?post_id=".$row['post_id']."' type='button' class='btn btn-warning btn-sm'>View</a>
                    <button type='button' onclick='inactive_comment(".$row['post_comment_id'].")' class='btn btn-warning btn-sm'>In-Active</button>
                    <button type='button' onclick='delete_comment(".$row['post_comment_id'].")' class='btn btn-danger btn-sm'>Delete</button>
                    </td>";
                 }
               else{
                 echo "<td> 
                    <a href='post-detail.php?post_id=".$row['post_id']."' type='button' class='btn btn-warning btn-sm'>View</a>
                    <button type='button' onclick='active_comment(".$row['post_comment_id'].")' class='btn btn-primary btn-sm'>Active</button>
                    <button type='button' onclick='delete_comment(".$row['post_comment_id'].")' class='btn btn-danger btn-sm'>Delete</button>
                    </td>";
               }

              
          
              
           }
           }
           else{
             echo "<td colspan='6' class='text-center fw-bold text-success'><h2>No Comments...</h2></td>"; 
           }
           ?>     