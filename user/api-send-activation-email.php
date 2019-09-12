<?php


$sActivationKey = $_GET['sKey'];
$sUserId = $_GET['id'];

// $sActivationKey =  $sAgentActivationKey;
// $sUserId = $sAgentId;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../src/PHPMailer.php';
require '../src/Exception.php';
require '../src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'stefan.test.andrei@gmail.com';                     // SMTP username --fake it
    $mail->Password   = 'phptest321';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('stefan.test.andrei@gmail.com', 'verify test');
    $mail->addAddress('stefan.test.andrei@gmail.com', 'Real Estate Test');     // Add a recipient

    // Content
    $mail->isHTML(true);
    $sPath = "http://127.0.0.1:8888/exam/user/api-activate-user-account.php?id=$sUserId&key=$sUserActivationKey";                         // Set email format to HTML
    $mail->Subject = 'Welcome to Real Estate - please activate your account';
    $mail->Body    = '<a href="' . $sPath . '"> Click here to activate your account</a>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send(); // send the email
    // echo 'Message has been sent';
    echo '{ "success" : "Message has been sent"}';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
}
