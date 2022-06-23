
<?php
	session_start();
	require_once '../required/connection.php';

	if (isset($_POST['login'])) {
		

		$email = $_POST['email'];
		$password = md5($_POST['password']);


		if ($email === '') {
			header('location:../login.php?msg=email is empty');
		}
		if ($password === '') {
			header('location:../login.php?msg=password is empty');
			
		}
		if ($email === '' && $password === '') {
			header('location:../login.php?msg=Please Enter email and Password');
			
		}

		if ($email !== '' && $password !== '') {
			
			$query = "SELECT * FROM user WHERE email = '".$email."' and password = '".$password."'";
			$result = mysqli_query($connection, $query);		

		if($result->num_rows){

			$user = mysqli_fetch_assoc($result);
			
			// print_r($user);
			if($user['is_approved'] == 'Pending'){
				header("location:../login.php?msg=Your Account is in Pending Please wait for Confirmation");
			}
			elseif($user['is_active'] == 'InActive'){
				header("location:../login.php?msg=Your Account is InActive Please Contact the Admin");
			}
			elseif($user['is_approved'] == 'Approved' && $user['is_active'] == 'Active'){
							
							$_SESSION['user'] = $user;
							if($user['role_id'] == 1 ){

								header("location:../admin-home.php");				
							}
							else{
								header("location:../index.php");
							}
			}
	
		}
		
		else{
			header("location:../login.php?msg=Invalid Email/password");

		}

		}		




	}
	

?>