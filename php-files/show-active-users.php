  <?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
      $query = "SELECT * FROM user WHERE is_active = 'Active'";

      $result = mysqli_query($connection, $query) ;



?>

  <?php
                 if ($result->num_rows) {
                   $no = 0;
                   while ($row = mysqli_fetch_assoc($result)) {
                     $no++;
                     echo "<tr id='user_record_".$row['user_id']."' >
                     <input type='hidden' name='image' id='image-address-".$row['user_id']."' value='profile-images/".$row['user_image']."'>
                     
                     <td>".$no."</td>
                     <td style='display:none'>".$row['user_image']."</td>

                    

                     <td>".$row['first_name']."</td>
                     <td style='display:none'>".$row['last_name']."</td>
                     <td style='display:none'>".$row['gender']."</td>
                     <td>".$row['email']."</td>
                     <td style='display:none'>".$row['address']."</td>
                     <td>".$row['created_at']."</td>
                     <td style='display:none'>".$row['updated_at']."</td>
                     <td>
                         <button id'".$row['user_id']."'  class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='show_profile(".$row['user_id'].")'>View</button>
                         <button id'".$row['user_id']."'  class='btn btn-success btn-sm'  onclick='edit_user(".$row['user_id'].")'>Edit</button>
                         <button type='button' class='btn btn-primary btn-sm' id'inactive_user_".$row['user_id']."' onclick='Inactive_user(".$row['user_id'].")'>InActive</button>
                         <button type='button' class='btn btn-danger btn-sm' onclick='delete_user(".$row['user_id'].")'>Delete</button>
                     </td>
                 </tr>";
                     
                 } 
                 }
                 else{
                   echo "<td colspan='5' class='text-center'>No Active Users</td>"; 
                 }
                 ?> 