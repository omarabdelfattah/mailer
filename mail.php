<?php
if( isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) ){
	$n = $_POST['n']; // HINT: use preg_replace() to filter the data
	$e = $_POST['e'];
	$m = nl2br($_POST['m']);
	$to = "omar.mero200125@gmail.com";	
	$from = $e;
	$subject = 'Contact Form Message';
	$message = '<b>Name:</b> '.$n.' <br><b>Email:</b> '.$e.' <p>'.$m.'</p>';
	$headers = "From: $from\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	// if( mail($to, $subject, $message, $headers) ){
	// 	echo "success";
	// } else {
	// 	echo "The server failed to send the message. Please try again later.";
	// }
	require ('PHPMailer/src/PHPMailer.php');
	require ('PHPMailer/src/SMTP.php"');
	require ('PHPMailer/src/Exception.php"');


    $mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($e, 'Contacted Me');
    $mail->addAddress('omar.mero200125@gmail.com', 'Joe User');     // Add a recipient
    // $mail->addAddress('omar.mero200125@gmail.com');               // Name is optional
    // $mail->addReplyTo('omar.mero200125@gmail.com', 'Information');
    $mail->addCC('omar.mero200125@gmail.com');
    $mail->addBCC('omar.mero200125@gmail.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('img/ehda.jpg', 'EhdaScript.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<div style="padding:7px;background-color:grey;">';
    $mail->Body    += '<h4>Hey, Omar Someone Contacted you Name : '.$n. ' '.' and his Email Adress Is : '.$e.'He Left to you this message ( Hope it be Happy message )->'.$m.'</h4>';
    $mail->Body    += '</div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}