<?php 

include("config.php");
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
function sendMail($email,$reset_token){
require('./phpmailer/PHPMailer.php');
require('./phpmailer/SMTP.php');
require('./phpmailer/Exception.php');
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lrdhingadiya@gmail.com';                     //SMTP username
	$mail->Password   = 'wsde nmuy twmq uvjt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
   # $mail->setFrom('lrdhingadiya@gmail.com', 'Estate');
	$mail->From = "lrdhingadiya@gmail.com";
	$mail->FromName = "estate";
    $mail->addAddress($email);     //Add a recipient
  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password reset Link';
    $mail->Body    = "we got request from you to reset your password!<br>
	<b>click the link</b>
	<a href='http://localhost/github/E-state/updatepass.php?email=$email&reset_token=$reset_token'>Reset Password</a>";

    $mail->send();
	return true;
} catch (Exception $e) {
	return false;
}
}
if(isset($_REQUEST['resetlink']))
{
	$email=$_POST['email'];
	$abc="SELECT * FROM `user` WHERE `uemail`='$email'";
	$bcd=mysqli_query($con,$abc);
	if($bcd){
		if(mysqli_num_rows($bcd)==1){
			$reset_token=bin2hex(random_bytes(16));
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d'); // adding
			
			$update_query = "UPDATE `user` SET  `resettoken` = '$reset_token', `resetexpiry` = '$date' WHERE `uemail` = '$email'";
			if($update_result = mysqli_query($con, $update_query) ){
				if( sendMail($_POST['email'],$reset_token)){
					echo"<script>alert('mail send'); window.location='login.php'</script>";
				}else{
					echo"<script>alert('mail not send'); window.location='changepass.php'</script>";
				}


			}
			else{
				echo"<script>alert('cannot run  not query.'); window.location='changepass.php'</script>";

			}
		}		
	}
	else{
 echo"<script>alert('cannot run query.'); window.location='changepass.php'</script>";
                                       
	}
}

?>