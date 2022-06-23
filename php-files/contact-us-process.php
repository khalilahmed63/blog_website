<?php


session_start();
require_once '../required/connection.php';
date_default_timezone_set("Asia/Karachi");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
      
if (isset($_REQUEST['send'])) {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
  		

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
    $mail->addAddress('panhwarkhalilahmed@gmail.com', "Reciever");
    $mail->addCC('$cc','name');
    $mail->addBCC('$bcc','name');

    //Set the subject linew
    $mail->Subject = "Message From 63-Blogger";

    //Read an HTML message body
    //$mail->isHTML();
   

    if (isset($_SESSION['user'])) {

        print_r($_SESSION['user']);
        $mail->msgHTML(	
            "First Name is : $first_name<br/>".		
             "Last Name is : $last_name<br/>".			
             "Email : $email<br/>".		
             "Phone : $phone<br/>".
             "Message : $message<br/>".
             "<br>".			
             "<br>".			
             "Regards 63-Blogger<br>"		
                );



    


    }
    else {

        $mail->msgHTML(
            "First Name is : $first_name<br/>".		
            "Last Name is : $last_name<br/>".			
            "Email : $email<br/>".		
            "Phone : $phone<br/>".
            "Message : $message<br/>".
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
        header("location:../contact-us.php?msg=Successfully Sent"); 
        echo '<center><h1>Congrats Your Email is Sent :)</h1></center>';
    }     
    ////////////// php mailer code end


		

}
else{
    header("location:index.php"); 
}


?>