					<?php
					session_start();


					if($_SESSION['user']){
					

						$first_name = $_SESSION['user']['first_name'];
						$last_name = $_SESSION['user']['last_name'];
						$email = $_SESSION['user']['email'];
						$dob = $_SESSION['user']['date_of_birth'];
						$gender = $_SESSION['user']['gender'];
						$address = $_SESSION['user']['address'];
						


					}

					ob_start();
					require_once '../fpdf/fpdf.php';
					$fpdf = new FPDF();


					
					$fpdf->addpage('','',0);    
					$fpdf->setfont('Arial','B', 22);
					$fpdf->setfillcolor(174, 235, 242);
					$fpdf->SetTextColor(194,8,8);
					$fpdf->cell(190,15,$first_name,0,1,'C',true);
					$fpdf->setfont('Arial','', 20);
					$fpdf->SetTextColor(0,0,0);
					$fpdf->cell(190,13,'Congrats You Are Success fully Registerd on 63-Blogger',0,1,'C');
					$fpdf->ln(5);
					$fpdf->setfont('Arial','', 16);
					$fpdf->SetTextColor(0,0,0);
					$fpdf->cell(190,13,'You Will Receive Email When your Account is Verified by the Admin',0,1,'C');
					$fpdf->ln(5);
					$fpdf->setfont('Arial','', 20);
					$fpdf->SetTextColor(0,0,0);
					$fpdf->cell(190,13,'Your Account Information Given Below',0,1,'C');
					$fpdf->ln(5);
					$fpdf->SetTextColor(0,0,0);
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'First_name :',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$first_name,0,1,'');
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'Last_name:',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$last_name,0,1,'');
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'Email:',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$email,0,1,'');
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'Date of Birth:',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$dob,0,1,'');
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'Gender:',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$gender,0,1,'');
					$fpdf->setfont('Arial','B', 16);
					$fpdf->cell(70,10,'Address:',0,0,'');
					$fpdf->setfont('Arial','', 16);
					$fpdf->cell(70,10,$address,0,1,'');
					$fpdf->ln(5);
					$fpdf->setfont('Arial','B', 22);
					$fpdf->setfillcolor(174, 235, 242);
					$fpdf->SetTextColor(194,8,8);
					$fpdf->cell(190,15,'Regards : 63-Blogger (www.63blogger.com)',0,1,'C',true);
					$fpdf->output('D','user_details.pdf','');
					ob_end_flush();
?>