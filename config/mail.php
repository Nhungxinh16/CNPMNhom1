<?php
    require '../phpmailer/Exception.php';
    require '../phpmailer/PHPMailer.php';
    require '../phpmailer/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $bodyContent = '<h1>MyTour kính chào quý khách</h1>'; 
    $bodyContent .= '<p>Bạn hãy nhấn vào đường dẫn sau để thanh toán <a href="#">Click Here</a></p>';


    $paySuccess = "<h1>Thanh toán thành công</h1>";

    function send_mail($to, $subject, $message){
        try {
            $email = $to;
            //Server settings
            $mail = new PHPMailer(true);
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'tuyetnhung01062001@gmail.com';// SMTP username
            $mail->Password = 'xbcibtjbdmgahmiu'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('tuyetnhung01062001@gmail.com', 'MyTour.com - Du lịch khắp mọi nơi');
            $mail->addReplyTo('tuyetnhung01062001@gmail.com', 'MyTour.com - Du lịch khắp mọi nơi');
            $mail->addAddress($email); // thay = tên biến chứa email đky
        
            // Content
            $mail->isHTML(true); 
        
            // Mail subject 
            $mail->Subject = $subject; 
            
            // Mail body content 
        
             
            $mail->Body = $message; 
            
            // Send email 
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>