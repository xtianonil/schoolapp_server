<?php
	//echo !extension_loaded('openssl')?"Not Available":"Available";
	if ( isset($_POST["userid"]) && isset($_POST["email"]) )
	{
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  				// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'co.tolentino@gmail.com';                 // SMTP username
		$mail->Password = 'zxcvbnm1036';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('co.tolentino@gmail.com', 'School App Support');
		$mail->addAddress($_POST["email"]);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Account Verification';
		$mail->Body    = 'Please click on the <a href="http://localhost/school_connect_server/account_activation.php?id=' . $_POST["userid"] . '">link</a> to activate your account.';
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}//end of if isset $_POST["userid"]
?>	