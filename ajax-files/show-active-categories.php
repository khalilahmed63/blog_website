  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $active_category_query = "SELECT * FROM category WHERE category_status = 'Active'";

      $active_category_result = mysqli_query($connection, $active_category_query) ;

?>
      				
              <?php
           if ($active_category_result->num_rows) {
             $no = 0;
             while ($active_category_row = mysqli_fetch_assoc($active_category_result)) {
               $no++;
               echo "<tr>
               <td>".$no."</td>
               <td>".$active_category_row['category_id']."</td>
               <td>".$active_category_row['category_title']."</td>
               <td style='display: none'>".$active_category_row['category_description']."</td>
               <td style='display: none'>".$active_category_row['category_status']."</td>
               <td>".$active_category_row['created_at']."</td>
               <td style='display: none'>".$active_category_row['updated_at']."</td>
               <td>
                   <button  onclick='view_category(".$active_category_row['category_id'].")' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' class='btn btn-warning btn-sm'>View</button>
                   <button onclick='inactive_category(".$active_category_row['category_id'].")' type='button' class='btn btn-primary btn-sm'>InActive</button>
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_category(".$active_category_row['category_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>There is no Record</h2></td>"; 
           }
           ?>  
   
      