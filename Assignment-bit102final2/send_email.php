<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
 
// Load Composer's autoloader
require 'vendor/autoload.php';
 
$mail = new PHPMailer(true);
 
try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                           // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';      // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                  // Enable SMTP authentication
    $mail->Username   = 'tlee88769@gmail.com'; // change to your gmailSMTP username
    $mail->Password   = 'wqsy sdgi qleo jxaz';       // SMTP password (or app password if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                   // TCP port to connect to
 
    //Recipients
    $mail->setFrom('tlee88769@gmail.com', 'Mailer');
    $mail->addAddress('tlee88769@gmail.com', 'Recipient'); // Add a recipient
 
    // Content
    $mail->isHTML(true);                       // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>