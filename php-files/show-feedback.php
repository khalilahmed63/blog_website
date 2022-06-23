<?php 
session_start();
require_once '../required/connection.php';

      if($_SESSION['user']['role_id'] != 1 ){
        header("location:index.php");       
      }
       
$query = "SELECT * FROM user_feedback ";

$result = mysqli_query($connection, $query) ;

?>

<?php
                      if ($result->num_rows) {
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                          $no++;
                          echo "<tr id='feedback_record_".$row['feedback_id']."'>
                          <td>".$no."</td>
                          <td>".$row['user_id']."</td>
                          <td>".$row['user_name']."</td>
                          <td>".$row['user_email']."</td>
                          <td>".$row['feedback']."</td>
                          <td>".$row['created_at']."</td>
                          <td>
                              <button data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='feedback_modal(".$row['feedback_id'].")' type='button' class='btn btn-warning btn-sm'>View</button>
                              
                              <button onclick='delete_feedback(".$row['feedback_id'].")' type=button' class='btn btn-danger btn-sm'>Delete</button>
                          </td>
                          </tr>";
                      }
                      }
                      else{
                        echo "<h2 class'text-success text-center fw-bold'>There is no Record</h2>"; 
                      }
                      ?>   