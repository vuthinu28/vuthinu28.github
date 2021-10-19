<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'vuthinu27@gmail.com';// SMTP username
    $mail->Password = 'jwfllgxnhhbcavtj'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('vuthinu27@gmail.com', 'Trường ĐH Thủy lợi');

    //$mail->addReplyTo('vuthinu27@gmail.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
      
    $mail->addAddress('vuthinu27@gmail.com'); // Add a recipient
    
    // Attachments
    // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
//->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $tieude = '[Danh bạ điện tử]';
    $mail->Subject = $tieude;
    
    // Mail body content 
    $bodyContent = 'Mời bạn xác minh mật khẩu Danh bạ điện tử ĐHTL'; 
    $bodyContent = <a href='facebook.com'>click here</a>

    
    $mail->Body = $bodyContent;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
        echo 'Thư đã được gửi đi';
    }else{
        echo 'Lỗi. Thư chưa gửi được';
    }  

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
}

?>
