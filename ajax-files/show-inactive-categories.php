  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
 
      $inactive_category_query = "SELECT * FROM category WHERE category_status = 'InActive'";
    
      $inactive_category_result = mysqli_query($connection, $inactive_category_query) ;

?>
      				
              <?php
           if ($inactive_category_result->num_rows) {
             $no = 0;
             while ($inactive_category_row = mysqli_fetch_assoc($inactive_category_result)) {
               $no++;
               echo "<tr>
               <td>".$no."</td>
               <td>".$inactive_category_row['category_id']."</td>
               <td>".$inactive_category_row['category_title']."</td>
               <td style='display: none'>".$inactive_category_row['category_description']."</td>
               <td style='display: none'>".$inactive_category_row['category_status']."</td>
               <td>".$inactive_category_row['created_at']."</td>
               <td style='display: none'>".$inactive_category_row['updated_at']."</td>
               <td>
                   <button  onclick='view_category(".$inactive_category_row['category_id'].")' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning btn-sm'>View</button>
                   <button  type='button' class='btn btn-success btn-sm' onclick='active_category(".$inactive_category_row['category_id'].")'>Active</button>
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_category(".$inactive_category_row['category_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>No In-Active Categories</h2></td>"; 
           }
           ?>  