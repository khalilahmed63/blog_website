    <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM POST WHERE post_status = 'Active'";

      $result = mysqli_query($connection, $query) ;

?>

<?php
           if ($result->num_rows) {
             $no = 0;
             while ($row = mysqli_fetch_assoc($result)) {
               $no++;
               echo"<tr>
               <td>".$no."</td>
               <td>".$row['post_title']."</td>
               <td>".$row['post_summary']."</td>
               <td>".$row['created_at']."</td>
               <td>
                   <a href='post-detail.php?post_id=".$row['post_id']."' type='button' class='btn btn-warning btn-sm'>View</a>
                   <button id'".$row['post_id']."'  class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='edit_post(".$row['post_id'].")'>Edit</button>
                   <button  type='button' class='btn btn-primary btn-sm' onclick='Inactive_post(".$row['post_id'].")'>InActive</button>
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_post(".$row['post_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td>There is no Record</td>"; 
           }
           ?>     