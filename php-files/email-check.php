<?php
	require_once '../required/connection.php';		
	
	if(isset($_POST['email'])){
	
	$email = $_POST['email'];

	$query = "SELECT * FROM USER WHERE email = '".$email."'";

	$result = mysqli_query($connection, $query)	;

	if($result->num_rows){
		echo "Email already exist";
		?>
		<input type='hidden' name='flag' id='flag' value='false'>
		<?php
			
		}
		else{
			return(true);
		}




		
	}




?>