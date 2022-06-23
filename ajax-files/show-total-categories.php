  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM category";

      $result = mysqli_query($connection, $query) ;



?>
      				
              <?php
           if ($result->num_rows) {
             $no = 0;
             while ($row = mysqli_fetch_assoc($result)) {
               $no++;
               echo "<tr id='category_record_".$row['category_id']."'>
               <td>".$no."</td>
               <td>".$row['category_id']."</td>
               <td>".$row['category_title']."</td>
               <td style='display: none'>".$row['category_description']."</td>
               <td style='display: none'>".$row['category_status']."</td>
               <td>".$row['created_at']."</td>
               <td style='display: none'>".$row['updated_at']."</td>
               <td>
                   <button  onclick='view_category(".$row['category_id'].")' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' class='btn btn-warning btn-sm'>View</button>
                   ";
                   if($row['category_status'] == 'Active'){
                    echo "
                    <button  type='button' class='btn btn-primary btn-sm' onclick='inactive_category(".$row['category_id'].")'>InActive</button>";
                   }
                   else{
                      echo 
                      "<button  type='button' class='btn btn-success btn-sm' onclick='active_category(".$row['category_id'].")'>Active</button>";
                   }
                  echo " 
                   <button  type=button' class='btn btn-danger btn-sm' onclick='delete_category(".$row['category_id'].")'>Delete</button>
               </td>
               </tr>";
           }
           }
           else{
             echo "<td colspan='5' class='text-success text-center p-3'><h2>There is no Record</h2></td>"; 
           }
           ?>    