

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';






	session_start();
	require_once '../required/connection.php';
	date_default_timezone_set("Asia/Karachi");
	if (isset($_POST['register'])) {

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$password = md5($_POST['password']);
		$password2 = $_POST['password'];
		$confirm_password = md5($_POST['confirm_password']);
		

		if ($first_name === '') {
			header('location:../register.php?msg=first Name is empty');
		}

		if ($email === '') {
			header('location:../register.php?msg=email is Empty');
		}


		if ($dob === '') {
			header('location:../register.php?msg=Date of Birth is Empty');
		}

		if ($gender === '') {
			header('location:../register.php?msg=gender is Empty');
		}
		

		if ($address === '') {
			header('location:../register.php?msg=Address is Empty');
		}
		if ($password === '') {
			header('location:../register.php?msg=password is empty');
			
		}
		if ($confirm_password === '') {
			header('location:../register.php?msg=Confirm Password is Empty');
			
		}
		
		if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1) {
			
			$is_approved = 'Approved';
		}
		else{

			$is_approved = 'Pending';
		}

		$filename = $_FILES["image"]["name"];

		$time_stamp = date("Y-m-d h:i:s");
		if ($first_name !== '' &&  $email !== '' && $dob !== '' && $gender !== '' && $address !== '' && $password !== '' && $confirm_password !== '') {
			
			$query = "INSERT INTO user (`role_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `date_of_birth`, `user_image`, `address`, `is_approved`, `is_active`, `created_at`, `updated_at`) VALUES ('2', '$first_name', '$last_name', '$email', '$password', '$gender', '$dob', '$filename', '$address', '$is_approved', 'Active', '$time_stamp', '$time_stamp'); ";

			$result = mysqli_query($connection, $query)	;

			

			$dir = "../images/profile-images";
			if (!is_dir($dir)) 
			{
				mkdir($dir);
				// echo "Directory Created";
			}   
		    else
		    {
		    	// echo "Not Created";
		    }
	   
	   
	   		
			
			$tempname = $_FILES['image']['tmp_name'];
			
			$dir = "../images/profile-images";
	   
			if (move_uploaded_file($tempname,$dir.'/'.$filename)){
					 // echo "profile Uploaded...!";
				 }
			else{
				// echo "Not Working";
			}	
	   

				////////////// php mailer code start

				$mail = new PHPMailer();

				$mail->isSMTP();
				//Enable SMTP debugging

				//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';
				// use
				// $mail->Host = gethostbyname('smtp.gmail.com');
				// if your network does not support SMTP over IPv6
				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;

				//Set the encryption mechanism to use - STARTTLS or SMTPS
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;

				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = 'khalilahmed786su@gmail.com';

				//Password to use for SMTP authentication
				$mail->Password = 'kmlylmhdmpalvaao';

				//Set who the message is to be sent from
				$mail->setFrom('khalilahmed786su@gmail.com');

				//Set an alternative reply-to address
				$mail->addReplyTo('khalilahmed786su@gmail.com', 'Khalil Ahmed');

				//Set who the message is to be sent to
				$mail->addAddress($email, "Reciever");
				$mail->addCC('$cc','name');
				$mail->addBCC('$bcc','name');

				//Set the subject linew
				$mail->Subject = "Successfully Registered on 63-Blogger";

				//Read an HTML message body
				//$mail->isHTML();
				//$mail->msgHTML("This Is Testing Message Using PhpMailer");
				// $mail->msgHTML("$message");

				if (!(isset($_SESSION['user']))) {
					$mail->msgHTML(
						"You Are Registerd Successfully on 63-blogger Please wait for you Account Verified<br>".		
						"You Will Receive Email When your Account is Verified by the Admin<br>".		
						"your First Name is : $first_name<br/>".		
						 "your Last Name is : $last_name<br/>".			
						 "your Email is : $email<br/>".			
						 "your Date of Birth is : $dob<br/>".			
						 "your Gender is : $gender<br/>".			
						 "your Address is : $address<br/>".			
						 "your Password is : $password2<br/>".
						 "<br>".			
						 "<br>".			
						 "Regards 63-Blogger<br>"		
							);



				


				}
				else {
					$mail->msgHTML(
						"You Are Registerd Successfully on 63-blogger And your Account is Verified<br>".	
						"Login at : www.63blogger.com<br>".	
						"your First Name is : $first_name<br/>".		
						 "your Last Name is : $last_name<br/>".			
						 "your Email is : $email<br/>".			
						 "your Date of Birth is : $dob<br/>".			
						 "your Gender is : $gender<br/>".			
						 "your Address is : $address<br/>".			
						 "your Password is : $password2<br/>".
						 "<br>".			
						 "<br>".			
						 "Regards 63-Blogger<br>"		
							);

				
				}
				


				
				//Attach an image file (optional)
				// $mail->addAttachment($image_name ,"$image_name");

				//send the message, check for errors
				if (!$mail->send()) {
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				
				} else {
					
					// echo '<center><h1>Congrats Your Email is Sent :)</h1></center>';
				}     
				////////////// php mailer code end

			if (isset($_SESSION['user']) && $result ) {
				// echo "if condition";
				
				?>
				<script type="text/javascript">
					
					window.location.href = '../add-user.php?msg=Registered Successfully'
				</script>
				<?php
				header('location:../add-user.php?msg=Registered Successfully');
				// echo "Success fully add user";
			}
			elseif($result){
				echo "Success fully add user";
				
				header('location:../login.php?reg_msg=Registered Successfully Wait for Confirmation');
			} 
			else{
				echo "else part";
				header('location:../Register.php?reg_msg=Registeration Failed');
			}
			

		}	

			




	}

?>