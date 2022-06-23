


<?php
	require_once '../required/connection.php';
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	require '../PHPMailer/src/Exception.php';
	
	if(isset($_POST['user_id'])){
	
	$user_id = $_POST['user_id'];

	 
	$query = "UPDATE user SET `is_active` = 'InActive' WHERE `user_id` = '".$user_id."'";

	$result = mysqli_query($connection, $query);

	$query2 = "SELECT * FROM user WHERE `user_id` = '".$user_id."'";

	$result2 = mysqli_query($connection, $query2);

	$row2 = mysqli_fetch_assoc($result2);

	$first_name = $row2['first_name'];
	$last_name = $row2['last_name'];
	$email = $row2['email'];


	if($result){

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
		$mail->Password = 'khalil786su';

		//Set who the message is to be sent from
		$mail->setFrom('khalilahmed786su@gmail.com');

		//Set an alternative reply-to address
		$mail->addReplyTo('khalilahmed786su@gmail.com', 'Khalil Ahmed');

		//Set who the message is to be sent to
		$mail->addAddress($email, "Reciever");
		$mail->addCC('$cc','name');
		$mail->addBCC('$bcc','name');

		//Set the subject linew
		$mail->Subject = "Account Disabled on 63-Blogger";

		//Read an HTML message body
		//$mail->isHTML();
		//$mail->msgHTML("This Is Testing Message Using PhpMailer");
		// $mail->msgHTML("$message");

		
			$mail->msgHTML(
				"Your Account is In-Activated by the Admin on 63-blogger.com<br>".	
				"Please contact admin for further details on www.63blogger.com <br>".	
				"your First Name is : $first_name<br/>".		
				 "your Last Name is : $last_name<br/>".			
				 "your Email is : $email<br/>".			
				
				 "<br>".			
				 "<br>".			
				 "Regards 63-Blogger<br>"		
					);

		
		

		
		//Attach an image file (optional)
		// $mail->addAttachment($image_name ,"$image_name");

		//send the message, check for errors
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo "User In-Activated Successfully";
		}     
		////////////// php mailer code end
		}
	else{
		echo "faild";
		}




		
	}




?>